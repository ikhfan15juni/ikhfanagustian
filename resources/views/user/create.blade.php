@extends('layouts.template')

@section('content')
    <div class="container mt-4">
        <h2>Tambah Data Staff TU</h2>

        <div class="border p-5">
            <form method="post" action="{{ route('user.store') }}">
                @csrf

                @if (Session::get('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif

                @if ($errors->any())
                    <ul class="alert alert-danger p-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">Nama:</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary float-end">Simpan</button>
            </form>
        </div>
    </div>
@endsection
