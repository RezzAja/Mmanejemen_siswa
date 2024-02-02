@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between mb-5">
            <h4 class="fw-bold ">Data Wali Murid {{ $item->name }}</h4>
            <a href="{{ route('wali.create', $item->id)}}" class="btn btn-primary d-flex align-items-center gap-2">
                <i class="bx bx-plus"></i> Tambah Data Wali Murid
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
                    <th>Nama </th>
                    <th>Posisi</th>
                    
                    <th>Agama</th>
                    <th>Pekerjaan</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($parents as $key => $parent)
                <tr>

                    <td>{{$key + 1}}</td>
                    <td>{{$parent -> name}}</td>
                    <td>{{$parent -> parent_type}}</td>
                    
                    <td>{{$parent -> religion}}</td>
                    <td>{{$parent -> work}}</td>
                    <td>
                        <div class="d-flex gap-2 ">
                            <a href="{{ route('wali.edit', ['id_student' => $item->id, 'id_parent' => $parent->id])}}" class="btn btn-sm btn-warning text-white align-items-center"><i class='bx bx-edit'></i> Edit</a>
                            <form action="{{ route('wali.destroy', $parent->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger px-4 align-items-center" type="submit" onclick="return confirm('Apakah kamu yakin ingin menghapusnya?')">
                                    <i class='bx bx-message-x' ></i> Hapus
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
