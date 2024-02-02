@extends('layouts.app')
@section('content')
<section class="py-5">
    <div class="container">
        <h4 class="fw-bold mb-5">
            Edit Data Wali Murid {{$item->name}}
        </h4>
        <div class="card border-0">
            <div class="card-body p-4">
                <form action="{{route('wali.update' , $item->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id_student" value="{{ $item->id }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name">Nama Wali</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{$item-> name}}" required>
                        </div>
                    </div>
                   
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="parent_type">Jenis kelamin</label>
                            <select name="parent_type" id="parent_type" class="form-control">
                            <option value="ayah" {{$item->gender == 'ayah' ? 'SELECTED' : ''}}>Ayah (orang tua laki-laki)</option>
                            <option value="ibu" {{$item->gender == 'Laki-laki' ? 'SELECTED' : ''}}>Ibu (orang tua perenpuan)</option>
                            <option value="wali"  {{$item->gender == 'wali' ? 'SELECTED' : ''}}>wali (Kerabat)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="date_of_birth">Tanggal lahir</label>
                            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{$item-> date_of_birth}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="place_of_birth">Tempat lahir</label>
                            <input type="text" name="place_of_birth" id="place_of_birth" class="form-control" value="{{$item-> place_of_birth}}" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="address">Alamat Wali</label>
                          <textarea name="address" id="address" cols="30" rows="3" class="form-control" required>{{$item-> address}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="religion">Agama</label>
                            <select name="religion" id="religion" class="form-control">
                            <option value="Islam"  {{$item->gender == 'Islam' ? 'SELECTED' : ''}}>Islam</option>
                            <option value="Konghucu" {{$item->gender == 'Konghucu' ? 'SELECTED' : ''}}>Konghucu</option>
                            <option value="Kristen Protestan" {{$item->gender == 'Kristen Prostestan' ? 'SELECTED' : ''}}>Kristen Prostestan</option>
                            <option value="Kristen Katolik" {{$item->gender == 'Kristen Katolik' ? 'SELECTED' : ''}}>Kristen Katolik</option>
                            <option value="Hindu" {{$item->gender == 'Hindu' ? 'SELECTED' : ''}}>Hindu</option>
                            <option value="budha" {{$item->gender == 'budha' ? 'SELECTED' : ''}}>budha</option>
                            </select>
                        </div>
                    </div>            
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="work">Pekerjaan</label>
                            <input type="text" name="work" id="work" class="form-control" value="{{$item->work}}" required>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('wali.index', $student->id) }}" class="btn btn-secondary">Batal</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection