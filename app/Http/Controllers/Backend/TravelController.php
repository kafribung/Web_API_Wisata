<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\TravelRequest;
use App\Models\Travel;

class TravelController extends Controller
{
   // Read
    public function index()
    {
        $travels = Travel::with('travelImages')->get();
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
        $request->user()->travels()->create($data);
        return redirect('/travel')->with('msg', 'Data wisata berhasil ditambahkan!');
    }

    // Show
    public function show($id)
    {
        //
    }

    // Edit
    public function edit($id)
    {
        //
    }

    // / Update
    public function update(Request $request, $id)
    {
        //
    }

    // Destroy
    public function destroy($id)
    {
        //
    }
}
