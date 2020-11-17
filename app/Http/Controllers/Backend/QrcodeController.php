<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrcodeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        QrCode::size(200)->generate($slug, public_path('qr-codes/qrcode.png'));
        return view('backend.qrcode', compact('slug'));
    }

    public function print()
    {
        $file = public_path('qr-codes/qrcode.png');
        return response()->download($file);
    }
}
