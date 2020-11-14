@extends('layouts.master_dash', ['title' => 'Dashboard - gambar wisata '])
@section('content')
<div class="app-main__inner" id="app">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                    </i>
                </div>
                <div>gambar wisata 
                    <div class="page-title-subheading"> Data gambar wisata.</div>
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
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Table with hover</h5>
                    @can('isOwner', $travel)
                    <a href="/travel-img/{{ $travel->slug }}/create" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i></a>
                    @endcan
                    <table class="mb-0 table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Wisata</th>
                            <th>Author</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $angkaAwal = 1
                        @endphp
                        @forelse ($travel->travelImages()->latest()->get() as $travelImage)
                        <tr>
                            <th scope="row">{{ $angkaAwal++ }}</th>
                            <td><img src="{{ $travelImage->takeImg }}" alt="Error" width="100"></td>
                            <td>{{ $travelImage->travel->name }}</td>
                            <td>{{ $travelImage->travel->user->name }}</td>
                            <td>
                                @can('isOwner', $travelImage->travel)
                                <a href="/travel-img/{{ $travelImage->id }}/edit"
                                    class="btn btn-warning btn-sm m-1"><i class="fa fa-edit"></i>
                                </a>
                                <button type="submit"
                                    ref="delete"
                                    v-on:click="deleteTravelImage({{ $travelImage->id }})"
                                    class="btn btn-danger btn-sm m-1"><i class="fa fa-trash"></i>
                                </button>
                                @endcan
                            </td>
                        </tr>    
                        @empty
                            <small class="text-info">Gambar wisata belum ditambahkan</small>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
                deleteTravelImage(id) {

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
                                    .delete('/travel-img/' + id)
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
@stop