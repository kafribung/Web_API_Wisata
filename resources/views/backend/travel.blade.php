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
    <div class="row" id="app">
        @forelse ($travels as $travel)
        <div class="col-md-6 col-xl-4">
            <div class="mb-3 card card-body">
                <h5 class="card-title">{{ $travel->name }} ({{ $travel->location }})</h5>
                <small>{{ $travel->user->name }}</small>
                <img src="{{ $travel->takeImg }}" class="card-img-top" alt="Error" height="300"> 
                <p>{{ Str::limit($travel->description, 200)  }}</p>
                <a href="/travel-img/{{ $travel->slug }}" class="btn btn-outline-dark mb-1 mt-2"><i class="fa fa-image"></i></a>
                @can('isOwner', $travel)
                <a href="{{ route('travel.edit', $travel->slug) }}" class="btn btn-outline-warning mb-1"><i class="fa fa-edit"></i></a>
                <button ref="delete" v-on:click='deleteTravel({{ $travel->id }})' class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                @endcan
            </div>
        </div>
        @empty
            <small class="text-info">Data wisata belum ditambahkan</small>
        @endforelse
    </div>
</div>
@push('script_vue_js_axios_sweet')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>   
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        var app = new Vue({
            el: '#app',
            methods: {
                deleteTravel(id) {
                    swal({
                            title: "Are you sure?",
                            text: "Once deleted, you will not be able to recover this imaginary file!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                            })
                            .then((willDelete) => {
                            if (willDelete) {
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                });
                                axios
                                    // .delete(`/admin/${id}`)
                                    .delete('/travel/' + id)
                                    .then((response) => {
                                    this.$refs.delete.parentNode.parentNode.remove();
                                    location.reload();
                                    });
                            } else {
                                swal("Your imaginary file is safe!");
                            }
                        });
                }
            },
        })
    </script>
@endpush
@endsection