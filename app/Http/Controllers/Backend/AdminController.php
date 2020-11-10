<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AdminRequest;

class AdminController extends Controller
{
    // Read
    public function index()
    {
        $admins = User::where('role', 1)->get();
        return view('backend.admin', compact('admins'));
    }

    // Create
    public function create()
    {
        return view('backend_create.admin_create');
    }

    // Store
    public function store(AdminRequest $request)
    {
        if (User::where('role', 1)->count() >= 3) {
            return redirect('/admin')->with('msg', 'Data Admin MAX 3');
        }
        $data =  $request->all();
        if ($img = $request->file('img')) {
            $data['img'] = $img->storeAs('img_users', time(). '.' . $img->getClientOriginalExtension());
        }
        $data['password'] = bcrypt($request->password);
        $data['role']     = 1;
        User::create($data);
        return redirect('/admin')->with('msg', 'Data Admin Berhasil ditambahkan');
    }

    // Show
    public function show($id)
    {
        return abort('404');
    }

    // Edit
    public function edit(User $admin)
    {
        return view('')
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
