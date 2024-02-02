@extends('layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between mb-5">
                <h4 class="fw-bold ">Jurusan</h4>
                <button type="button" data-bs-toggle="modal" data-bs-target="#addModal"
                    class="btn btn-primary d-flex align-items-center gap-2">
                    <i class="bx bx-plus"></i> Tambah Jurusan
                </button>
            </div>
            @if (session('success'))
                <div class="alert alert-success d-flex align-items-center mb-3" role="alert">
                    <i class="bx bx-check"></i>
                    <div>
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-hover table-strippe">
                    <thead>
                        <tr style="vertical-align: middle">
                            <th>No</th>
                            <th>Nama Jurusan</th>
                            <th>Deskripsi</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $key => $item)
                            <tr>

                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->major_name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-sm btn-warning px-4" type="button" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $item->id }}"> 
                                            Edit
                                        </button>
                                        <form action="{{ route('jurusan.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger px-4" type="submit"
                                                onclick="return confirm('Apakah kamu yakin ingin menghapusnya?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal" tabindex="-1" id="editModal{{ $item->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"> Jurusan {{ $item->major_name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('jurusan.update', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="major_name">Nama Jurusan</label>
                                                    <input type="text" name="major_name" id="major_name"
                                                        class="form-control" value="{{ $item->major_name }} required">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="description">Deskripsi</label>
                                                    <textarea name="description" id="description" cols="30" rows="3" class="form-control">{{ $item->description }}</textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
            </div>
            @endforeach
            </tbody>
            </table>
        </div>
        </div>

    </section>
    <div class="modal" tabindex="-1" id="addModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Jurusan Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                  <div class="modal-body">
                    <form action="{{ route('jurusan.store') }}" method="POST">
                       @csrf
                        <div class="mb-3">
                            <label for="major_name">Nama Jurusan</label>
                            <input type="text" name="major_name" id="major_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="description">Deskripsi</label>
                            <textarea name="description" id="description" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
