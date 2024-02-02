@extends('layouts.app')
@section('content')
<section class="py-5">
    <div class="container">
        <h4 class="fw-bold mb-5">
            Tambah Guru
        </h4>
        <div class="card border-0">
            <div class="card-body p-4">
                <form action="{{route('guru.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nip">NIP</label>
                            <input type="text" name="nip" id="nip" class="form-control" required autofocus>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name">Nama Guru</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="date_of_birth">Tanggal lahir</label>
                            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="place_of_birth">Tempat lahir</label>
                            <input type="text" name="place_of_birth" id="place_of_birth" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="address">Alamat Guru</label>
                          <textarea name="address" id="address" cols="30" rows="3" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="photo">Photo</label>
                            <input type="file" name="photo" id="photo" class="form-control" accept="image/*" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="position">Jabatan</label>
                            <input type="text" name="position" id="position" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="gender">Jenis kelamin</label>
                            <select name="gender" id="gender" class="form-control">
                            <option value="Laki-Laki">Laki Laki</option>
                            <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="religion">Agama</label>
                            <select name="religion" id="religion" class="form-control">
                            <option value="Islam">Islam</option>
                            <option value="Konghucu">Kondhucu</option>
                            <option value="Kristen Protestan">Kristen Prostestan</option>
                            <option value="Kristen Katolik">Kristen Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="budha">budha</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('guru.index')}}" class="btn btn-secondary">Batal</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection