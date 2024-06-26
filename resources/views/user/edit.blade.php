@extends('layouts.template')

@section('content')
    <div class="card bg-light mt-5 p-5">
        <form action="{{ route('user.update', $user['id']) }}" method="post">
            @csrf
            @method('PATCH')
            @if ($errors->any())
                <ul class="alert alert-danger p-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            @if (Session::get('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            <div class="container mt-5">
                <h2>Edit User</h2>

                <form method="post" action="{{ route('user.update', $user->id) }}">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama:</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="col-sm-2 col-form-label">Password :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="password" name="password">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
    </div>
@endsection
