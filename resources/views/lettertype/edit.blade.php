@extends('layouts.template')

@section('content')
    <div class="card bg-light mt-5 p-5">
        <form action="{{ route('lettertype.update', $lettertypes['id']) }}" method="post">
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

                <form method="post" action=""{{ route('lettertype.update', $lettertypes->id) }}">
                    @csrf
                    @method('PATCH')

                    <!-- Formulir edit data user di sini -->
                    <div class="mb-3">
                        <label for="letter_code" class="form-label">Kode Surat :</label>
                        <input type="number" name="letter_code" class="form-control" value="{{ $lettertypes->letter_code }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="name_type" class="form-label">Klasifikasi Surat :</label>
                        <input type="text" name="name_type" class="form-control" value="{{ $lettertypes->name_type }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
    </div>
@endsection
