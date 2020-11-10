<?php

namespace App\Http\Controllers\Backend;

use App\Models\{Band, Genre};
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\BandRequest;
use Illuminate\Support\Facades\Storage;

class BandController extends Controller
{
    // Read
    public function index()
    {
        $bands = Band::with('genres')->orderBy('id', 'desc')->get();
        return view('backend.band', compact('bands'));
    }

    // Create
    public function create()
    {
        $genres =  Genre::get();
        return view('backend_create.band_create', compact('genres'));
    }

    // Store
    public function store(BandRequest $request)
    {
        $data =  $request->all();
        if ($img = $request->file('img')) 
            $data['img'] = $img->storeAs('band_images', time() .  '.' . $img->getClientOriginalExtension() );
        else $data['img'] = null;
        $data['slug'] = \Str::slug($request->name);
        // Eloquent input
        $band = Band::create($data);
        // Eloquent many to many
        $band->genres()->attach($request->genre);
        return redirect('/band')->with('msg', 'band successfully add');
    }

    // Show
    public function show($id)
    {
        return abort('404');
    }

    // Edit
    public function edit(Band $band)
    {
        $genres =  Genre::get();
        return view('backend_edit.band_edit', compact('genres', 'band'));
    }

    // / Update
    public function update(BandRequest $request, Band $band)
    {
        $data = $request->all();
        if ($img = $request->file('img')) {
            Storage::delete($band->img);
            $data['img'] = $img->storeAs('band_images', time(). '.' . $img->getClientOriginalExtension());
        }
        $data['slug'] = \Str::slug($request->name);
        // Eloquent Update
        $band->update($data);
        // Eloquent Many to many
        $band->genres()->sync($request->genre);
        return redirect('/band')->with('msg', 'Band Success Updated');
    }

    // Destroy
    public function destroy($id)
    {
        $band = Band::findOrFail($id);
        Storage::delete($band->img);
        $band->delete();
    }
}
