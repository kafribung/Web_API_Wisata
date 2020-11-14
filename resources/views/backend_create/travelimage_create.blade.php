@extends('layouts.master_dash', ['title' => 'Dashboard - tambah gambar wisata'])
@section('content')
<div class="app-main__inner" id="app">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                    </i>
                </div>
                <div>tambah gambar wisata
                    <div class="page-title-subheading">tambahkan gambar wisata.</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Lengkapi gambar wisata</h5>
                    <form action="/travel-img/{{ $travel->slug }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-backend.travelimage_form :travel="$travel"></x-backend.travelimage_form>
                        <button class="float-right mt-1 btn btn-primary">Store</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop