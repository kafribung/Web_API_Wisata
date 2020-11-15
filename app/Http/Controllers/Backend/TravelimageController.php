<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Travel;
use App\Models\Travelimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TravelimageController extends Controller
{
    // Read
    public function index(Travel $travel)
    {
        return view('backend.travelimage', compact('travel'));
    }

    // Create
    public function create(Travel $travel)
    {
        $this->authorize('isOwner', $travel);
        return view('backend_create.travelimage_create', compact('travel'));
    }

    // Store
    public function store(Request $request, Travel $travel)
    {
        $this->authorize('isOwner', $travel);
        if ($travel->travelImages()->count() >= 6) {
            return redirect('/travel-img/'. $travel->slug)->with('msg', 'Data gambar maksimal 6');
        }
        $data = $request->validate([
            'img' => ['required', 'mimes:png,jpg,jpeg']
        ]);
        if ($img = $request->file('img')) {
            $data['img'] = $img->storeAs('img_travelimages', time() . '.' . $img->getClientOriginalExtension());
        }
        $travel->travelImages()->create($data);
        return redirect('/travel-img/'. $travel->slug)->with('msg', 'Data gambar berhasil ditambhakan');
    }

    // Show
    public function show($id)
    {
        return abort('404');
    }

    // Edit
    public function edit(Travelimage $travelimage)
    {
        $this->authorize('isOwner', $travelimage->travel);
        return view('backend_edit.travelimage_edit', compact('travelimage'));
    }

    // / Update
    public function update(Request $request, Travelimage $travelimage)
    {
        $this->authorize('isOwner', $travelimage->travel);
        $data = $request->validate([
            'img' => ['required', 'mimes:png,jpg,jpeg']
        ]);
        if ($img = $request->file('img')) {
            Storage::delete($travelimage->img);
            $data['img'] = $img->storeAs('img_travelimages', time() . '.' . $img->getClientOriginalExtension());
        }
        $travelimage->update($data);
        return redirect('/travel-img/'. $travelimage->travel->slug)->with('msg', 'Data gambar berhasil diedit');

    }

    // Destroy
    public function destroy(Travelimage $travelimage)
    {
        $this->authorize('isOwner', $travelimage->travel);
        Storage::delete($travelimage->img);
        $travelimage->delete();
    }
}
