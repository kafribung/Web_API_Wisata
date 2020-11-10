@extends('layouts.master_dash', ['title' => 'Dashboard - admin'])
@section('content')
<div class="app-main__inner" id="app">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                    </i>
                </div>
                <div>admin
                    <div class="page-title-subheading"> All admin data.</div>
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
                <div class="card-body">
                    <h5 class="card-title">Table with hover</h5>
                    @if (Auth::user()->king())
                    <a href="/admin/create" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i></a>
                    @endif
                    <table class="mb-0 table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $angkaAwal = 1
                        @endphp
                        @forelse ($admins as $admin)
                        <tr>
                            <th scope="row">{{ $angkaAwal++ }}</th>
                            <td><img src="{{ $admin->takeImg }}" alt="Error" width="100"></td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>
                                @if ($admin->king())
                                <a href="/admin/{{ $admin->email }}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <button ref="delete" v-on:click="deleteAdmin({{ $admin->id }})" class="btn btn-danger btn-sm d-inline-block"><i class="fa fa-trash"></i></button>
                                @endif
                            </td>
                        </tr>    
                        @empty
                            <h2>The admin is null</h2>
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
                deleteAdmin(id) {
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
                                    .delete('/admin/' . id)
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