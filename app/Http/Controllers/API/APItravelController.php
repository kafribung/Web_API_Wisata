<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TravelResource;
use App\Models\Travel;
use Illuminate\Http\Request;

class APItravelController extends Controller
{
    public function index()
    {
        try {
            $search = urlencode(request('search'));
            if ($search) {
                $travels = Travel::with('travelImages', 'user')->where('name', 'LIKE', '%' . $search .'%')->paginate(12);
            } else  $travels = Travel::with('travelImages', 'user')->paginate(12); ;
            return TravelResource::collection($travels);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function show($slug)
    {
        try {
            $travel = Travel::with('travelImages', 'user')->where('slug', $slug)->get();
            return TravelResource::collection($travel);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
