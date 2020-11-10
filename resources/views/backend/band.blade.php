@extends('layouts.master_dash', ['title' => 'Dashboard - Band'])
@section('content')
<div class="app-main__inner" id="app">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                    </i>
                </div>
                <div>Band
                    <div class="page-title-subheading"> All band data.</div>
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
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Table with hover</h5>
                    <table class="mb-0 table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Profile</th>
                            <th>Band</th>
                            <th>Genre</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $angkaAwal = 1
                        @endphp
                        @forelse ($bands as $band)
                        <tr>
                            <th scope="row">{{ $angkaAwal++ }}</th>
                            <td><img src="{{ $band->takeImg }}" alt="Error" width="100"></td>
                            <td>{{ $band->name }}</td>
                            <td>
                                <ul>
                                    @foreach ($band->genres as $genre)
                                    <li>{{ $genre->name }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <a href="/band/{{ $band->slug }}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <button ref="delete" v-on:click="deleteBand({{ $band->id }})" class="btn btn-danger btn-sm d-inline-block"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>    
                        @empty
                            <h2>The Band is null</h2>
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
                deleteBand(id) {
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
                                    .delete(`/band/${id}`)
                                    .then((response) => {
                                        console.log(response.data)
                                    });
                                this.$refs.delete.parentNode.parentNode.remove();
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