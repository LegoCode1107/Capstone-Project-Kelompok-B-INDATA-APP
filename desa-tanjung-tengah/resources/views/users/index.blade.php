@extends('adminlte::page')

@section('title', 'Manajemen User')

@section('content_header')
<div class="indata-page-header">
    <div>
        <h1 class="indata-page-title">Manajemen User</h1>
        <p class="indata-page-sub">Kelola data pengguna sistem</p>
    </div>

    <a href="{{ route('users.create') }}" class="indata-btn-primary">
        <i class="fas fa-plus"></i> Tambah User
    </a>
</div>
@stop

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card shadow-sm border-0">

    <div class="card-header bg-white d-flex justify-content-between align-items-center">

        <h5 class="mb-0">
            <i class="fas fa-users text-primary"></i>
            Data User
        </h5>

        <span class="badge badge-primary">
            {{ $users->count() }} User
        </span>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table id="datatable" class="table table-hover">

                <thead>

                    <tr>
                        <th width="50">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Dibuat</th>
                        <th width="150" class="text-center">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($users as $user)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>
                            <strong>{{ $user->name }}</strong>
                        </td>

                        <td>{{ $user->email }}</td>

                        <td>
                            {{ $user->created_at}}
                        </td>

                        <td class="text-center">

                            <a href="{{ route('users.edit',$user->id) }}"
                               class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i>

                            </a>

                            <form
                                action="{{ route('users.destroy',$user->id) }}"
                                method="POST"
                                style="display:inline-block"
                                onsubmit="return confirm('Yakin hapus user ini?')">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@stop

@section('css')

<style>

.content-wrapper{
    background:#f4f6f9;
}

.indata-page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.indata-page-title{
    font-size:24px;
    font-weight:700;
    margin:0;
}

.indata-page-sub{
    color:#6c757d;
    margin:0;
}

.indata-btn-primary{
    background:#4e73df;
    color:white!important;
    padding:10px 20px;
    border-radius:8px;
    text-decoration:none;
    font-weight:600;
}

.indata-btn-primary:hover{
    background:#2e59d9;
}

.card{
    border-radius:15px;
}

.table thead th{
    background:#f8f9fc;
    border-top:none;
    font-size:12px;
    text-transform:uppercase;
    letter-spacing:1px;
}

.table tbody tr:hover{
    background:#f8f9fc;
}

.btn-sm{
    border-radius:8px;
}

.dataTables_filter input{
    border-radius:10px!important;
}

</style>

@stop

@section('js')

<script>

$(function(){

    $('#datatable').DataTable({
        responsive:true,
        pageLength:10,
        language:{
            search:'Cari : ',
            lengthMenu:'Tampilkan _MENU_ data',
            info:'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',
            zeroRecords:'Data tidak ditemukan',
            paginate:{
                previous:'<',
                next:'>'
            }
        }
    });

});

</script>

@stop
