@extends('adminlte::page')

@section('title','Tambah User')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card shadow">

            <div class="card-header">

                <h4>
                    <i class="fas fa-user-plus"></i>
                    Tambah User
                </h4>

            </div>

            <div class="card-body">

                <form action="{{ route('users.store') }}" method="POST">

                    @csrf

                    <div class="form-group">

                        <label>Nama</label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               required>

                    </div>

                    <div class="form-group">

                        <label>Email</label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               required>

                    </div>

                    <div class="form-group">

                        <label>Password</label>

                        <input type="password"
                               name="password"
                               class="form-control"
                               required>

                    </div>

                    <hr>

                    <a href="{{ route('users.index') }}"
                       class="btn btn-secondary">

                        Kembali

                    </a>

                    <button type="submit"
                            class="btn btn-primary">

                        Simpan

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@stop
