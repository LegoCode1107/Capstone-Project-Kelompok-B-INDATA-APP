@extends('adminlte::page')

@section('title','Edit User')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card shadow">

            <div class="card-header">

                <h4>
                    <i class="fas fa-user-edit"></i>
                    Edit User
                </h4>

            </div>

            <div class="card-body">

                <form action="{{ route('users.update',$user->id) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <div class="form-group">

                        <label>Nama</label>

                        <input type="text"
                               name="name"
                               value="{{ $user->name }}"
                               class="form-control"
                               required>

                    </div>

                    <div class="form-group">

                        <label>Email</label>

                        <input type="email"
                               name="email"
                               value="{{ $user->email }}"
                               class="form-control"
                               required>

                    </div>

                    <div class="form-group">

                        <label>Password Baru</label>

                        <input type="password"
                               name="password"
                               class="form-control">

                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengganti password
                        </small>

                    </div>

                    <hr>

                    <a href="{{ route('users.index') }}"
                       class="btn btn-secondary">

                        Kembali

                    </a>

                    <button type="submit"
                            class="btn btn-primary">

                        Update

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@stop
