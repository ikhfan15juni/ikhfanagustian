@extends('layouts.template')

@section('content')
    {{-- <div class="container mt-5"> --}}
    <h2>Data Guru</h2>
    <a href="/" class="list-group-item-action disable" tabindex="-1" aria-disabled="true">Home</a>
    /
    <a href="{{ route('guru.index') }}" class="list-group-item-action disable" tabindex="-1" aria-disabled="true">Data
        Staff</a>


        @if (Session::get('success'))
            <div class="alert alert-success"> {{ Session::get('success') }}</div>       
        @endif
        @if (Session::get('deleted'))
            <div class="alert alert-danger"> {{ Session::get('deleted') }}</div>   
        @endif
    

    <div>
        <div class="mb-3">
            <a href="{{ route('guru.create') }}" class="btn btn-secondary mt-5 ">Tambah Pengguna</a>
        </div>

        <div class="input-group mb-3">
            <div class="d-flex justify-content-start">
                <input type="text" name="cari" class="form-control">
                <button class="btn btn-primary"><i class="bi bi-search"></i>Cari</button>
            </div>
        </div>

        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>

                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td class="d-flex">
                        <a href="{{ route('guru.edit', $user->id) }}" class="btn btn-secondary me-3">Edit</a>
                            
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$user->id}}">
                            Hapus
                        </button>
                        </td>
                    </tr>

                    <div class="modal fade" id="exampleModal-{{ $user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">DataGuru</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Anda yakin akan menghapus Data?
                                </div>
                                <div class="modal-footer">
                                    <form action="{{route ('guru.delete', $user['id'])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-dark">Hapus</button>
                                    </form>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form tambah data user di sini -->
                    <form>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <input type="text" class="form-control" id="role">
                        </div>
                        <button type="button" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
