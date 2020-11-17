@extends('layouts.master_dash')
@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-car icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Qr-code
                    <div class="page-title-subheading">Print Qr-Code.</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 col-xl-6">
            <div class="card mb-3 widget-content bg-white">
                <div class="widget-content-wrapper text-black">
                    <div class="widget-content">
                        {!! QrCode::size(200)->generate($slug); !!}
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white">
                            <form action="/qr-code/print" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-print"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection