<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class PrivacyPolicyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('backend.privacypolicy');
    }
}
