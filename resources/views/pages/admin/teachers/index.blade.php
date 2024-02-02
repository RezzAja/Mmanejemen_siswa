@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between mb-5">
            <h4 class="fw-bold "> Guru</h4>
            <a href="{{ route('guru.create')}}" class="btn btn-primary d-flex align-items-center gap-2">
                <i class='bx bx-user-plus' style='color:#ffffff'  ></i> Tambah Guru
            </a>
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
                    <th>Photo</th>
                    <th>NIP</th>
                    <th>Nama Guru</th>
                    <th>Jabatan</th>
                    <th>Gender</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $key => $item)
                <tr>

                    <td>{{$key + 1}}</td>
                    <td>
                        <img src="{{url('storage/' . $item->photo)}}"width="30" height="" alt="">
                    </td>
                    <td>{{$item -> nip}}</td>
                    <td>{{$item -> name}}</td>
                    <td>{{$item -> position}}</td>
                    <td>{{$item -> gender}}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('guru.edit', $item->id)}}" class="btn btn-sm btn-warning text-white px-4">Edit</a>
                            <form action="{{ route('guru.destroy', $item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger px-4" type="submit" onclick="return confirm('Apakah kamu yakin ingin menghapusnya?')">
                            Hapus
                            </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>

</section>
@endsection
