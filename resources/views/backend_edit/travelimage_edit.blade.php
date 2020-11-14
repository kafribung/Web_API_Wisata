@extends('layouts.master_dash', ['title' => 'Dashboard - edit gambar wisata'])
@section('content')
<div class="app-main__inner" id="app">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                    </i>
                </div>
                <div>edit gambar wisata
                    <div class="page-title-subheading">edit gambar wisata.</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Lengkapi gambar wisata</h5>
                    <form action="/travel-img/{{ $travelimage->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <x-backend.travelimage_form :travel="$travelimage"></x-backend.travelimage_form>
                        <button class="float-right mt-1 btn btn-warning">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop