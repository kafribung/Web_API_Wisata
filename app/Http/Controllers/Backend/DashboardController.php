<?php

namespace App\Http\Controllers\Backend;

use App\Models\{User, Travel};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $admin  = User::where('role', 1)->count();
        $travel = Travel::count();
        return view('backend.dashboard', compact('admin', 'travel'));
    }
}
