@extends('layouts.master_dash', ['title' => 'Dashboard - Wisata'])
@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-car icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Data Wisata
                    <div class="page-title-subheading">Menampilkan semua data pariwisata.</div>
                </div>
            </div>
        </div>
    </div>
    @if (session('msg'))
    <div class="row">
        <p class="alert alert-success">{{  session('msg') }}</p>
    </div>
    @endif
    <div class="row">
        @forelse ($travels as $travel)
        <div class="col-md-6 col-xl-4">
            <div class="mb-3 card card-body">
                <h5 class="card-title">{{ $travel->name }} ({{ $travel->location }})</h5>
                <small>{{ $travel->user->name }}</small>
                <img src="{{ $travel->takeImg }}" class="card-img-top" alt="Error" width="200"> 
                <p>{{ $travel->description }}</p>
                <a href="" class="btn btn-outline-dark mb-1 mt-2"><i class="fa fa-image"></i></a>
                <button class="btn btn-outline-warning mb-1"><i class="fa fa-edit"></i></button>
                <button class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
            </div>
        </div>
        @empty
            <small class="text-info">Data wisata belum ditambahkan</small>
        @endforelse
    </div>
</div>
@endsection