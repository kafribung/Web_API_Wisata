<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\TravelRequest;
use App\Models\Travel;
use Illuminate\Support\Facades\Storage;

class TravelController extends Controller
{
   // Read
    public function index()
    {
        $search = urlencode(request('search'));
        if ($search)  $travels = Travel::with('travelImages')->where('name',  'LIKE', '%' . $search. '%')->orderBy('id', 'desc')->paginate(9);
        else $travels = Travel::with('travelImages')->orderBy('id', 'desc')->paginate(9);
        return view('backend.travel', compact('travels'));
    }

    // Create
    public function create()
    {
        return view('backend_create.travel_create');
    }

    // Store
    public function store(TravelRequest $request)
    {
        $data = $request->all();
        if ($bg = $request->file('bg')) {
            $data['bg'] = $bg->storeAs('img_travels', time(). '.' . $bg->getClientOriginalExtension());
        }
        $data['slug'] = \Str::slug($request->name);
        if (Travel::where('slug', $data['slug'])->first() != null) {
            $data['slug'] .= time();
        }
        $request->user()->travels()->create($data);
        return redirect('/travel')->with('msg', 'Data wisata berhasil ditambahkan!');
    }

    // Show
    public function show($id)
    {
        return abort('404');
    }

    // Edit
    public function edit(Travel $travel)
    {
        $this->authorize('isOwner', $travel);
        return view('backend_edit.travel_edit', compact('travel'));
    }

    // / Update
    public function update(TravelRequest $request, Travel $travel)
    {
        $this->authorize('isOwner', $travel);
        $data = $request->all();
        if ($bg = $request->file('bg')) {
            $travel->bg == 'img_travels/default_travel.jpg' ? null : Storage::delete($travel->bg);
            $data['bg'] = $bg->storeAs('img_travels', time(). '.' . $bg->getClientOriginalExtension());
        }
        $data['slug'] = \Str::slug($request->name);
        if (Travel::where('slug', $data['slug'])->first() != null) {
            $data['slug'] .= time();
        }
        $travel->update($data);
        return redirect('/travel')->with('msg', 'Data wisata berhasil diedit!');
    }

    // Destroy
    public function destroy($id)
    {
        $travel = Travel::findOrFail($id);
        $this->authorize('isOwner', $travel);
        $travel->bg == 'img_travels/default_travel.jpg' ? null : Storage::delete($travel->bg);
        $travel->delete();
    }
}
