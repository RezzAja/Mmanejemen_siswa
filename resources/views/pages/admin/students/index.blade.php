@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between mb-5">
            <h4 class="fw-bold ">Siswa</h4>
            <a href="{{ route('siswa.create')}}" class="btn btn-primary d-flex align-items-center gap-2">
                <i class='bx bx-user-plus' style='color:#ffffff'  ></i> Tambah Data Siswa
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
                    <th>NISN</th>
                    <th>Nama Murid</th>
                    <th>Gender</th>
                    <th>Kelas</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $key => $item)
                <tr>

                    <td>{{$key + 1}}</td>
                    
                    <td>{{$item -> nisn}}</td>
                    <td>{{$item -> name}}</td>
                    <td>{{$item -> gender}}</td>
                    <td>{{$item -> classroom->classroom_name}}</td>
                    <td>
                        <div class="d-flex gap-2 ">
                            <a href="{{ route('siswa.edit', $item->id)}}" class="btn btn-sm btn-warning text-white align-items-center"><i class='bx bx-edit'></i> Edit</a>
                            <form action="{{ route('siswa.destroy', $item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger px-4 align-items-center" type="submit" onclick="return confirm('Apakah kamu yakin ingin menghapusnya?')">
                                    <i class='bx bx-message-x' ></i> Hapus
                                </button>
                            </form>
                            <a href="{{ route('wali.index', $item->id)}}" class="btn btn-sm btn-success text-white px-4 align-items-center" method="GET">
                                <i class='bx bx-user-circle'></i> Data Wali</a>
                            <a href="{{ route('payment.index', $item->id)}}" class="btn btn-sm btn-info text-white px-4 align-items-center" method="GET">
                                <i class='bx bx-face'></i> Spp Anak</a>
                            
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
