@extends('layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between mb-5">
                <h4 class="fw-bold "> Mapel</h4>
                <button type="button" data-bs-toggle="modal" data-bs-target="#addModal"
                    class="btn btn-primary d-flex align-items-center gap-2">
                    <i class='bx bx-book-add'></i> Tambah Mapel
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
                        
                        <form action="{{ route('mapel.filter') }}" method="GET">
                           
                            <div class="mb-3 btn btn-success d-flex align-items-center gap-2">
                                <label for="group_of_course" class="text-center">Kelompok Mata Pelajaran</label>
                                <select name="group_of_course" id="group_of_course" class="form-control">
                                    <option value="">Pilih Kelompok Mapel</option>
                                    <option value="Kelompok A" {{  $kelompok == 'Kelompok A' ? 'SELECTED' : ''  }}>Kelompok A (Pelajaran Wajib)</option>
                                    <option value="Kelompok B" {{  $kelompok == 'Kelompok B' ? 'SELECTED' : ''  }}>Kelompok B (Jurusan)</option>
                                    <option value="Kelompok C" {{  $kelompok == 'Kelompok C' ? 'SELECTED' : ''  }}>Kelompok C (Peminatan)</option>
                                </select>
                                <button type="submit" class="btn btn-primary col-2"> <i class='bx bx-filter-alt'></i> Filter</button>
                            </div>
                        </form>
                        
                        <script>
                        
                        </script>
                        <tr style="vertical-align: middle">
                            <th>No</th>
                            <th>Mata Pelajaran</th>
                            <th>Guru Pengempu</th>
                            <th>Kelompok</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $key => $item)
                            <tr>

                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->course_name }}</td>
                                <td>{{ $item->course_teacher }}</td>
                                <td>{{ $item->group_of_course }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-sm btn-warning px-4" type="button" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $item->id }}"> 
                                            Edit
                                        </button>
                                        <form action="{{ route('mapel.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger px-4" type="submit"
                                                onclick="return confirm('Apakah kamu yakin ingin menghapusnya?')" >
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
                                            <h5 class="modal-title"> Mata Pelajaran {{ $item->course_name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('mapel.create', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="course_name">Nama Mapel</label>
                                                    <input type="text" name="course_name" id="course_name"
                                                        class="form-control" value="{{ $item->course_name }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="course_teacher">Guru Pengempu</label>
                                                    <input type="text" name="course_teacher" id="course_teacher"
                                                        class="form-control" value="{{ $item->course_teacher }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="group_of_course">Kelompok</label>
                                                    <select name="group_of_course" id="group_of_course" class="form-control">
                                                    <option value="Kelompok A" {{$item->group_of_course == 'Kelompok A' ? 'SELECTED' : ''}}>Kelompok A</option>
                                                    <option value="Kelompok B" {{$item->group_of_course == 'Kelompok B' ? 'SELECTED' : ''}}>Kelompok B</option>
                                                    <option value="Kelompok C" {{$item->group_of_course == 'Kelompok C' ? 'SELECTED' : ''}}>Kelompok C</option>
                                                   
                                                    </select>
                                                </div>
                                                        
                                                <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                                            </form>
                                        </div
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
                    <h5 class="modal-title">Tambah Mapel Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('mapel.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="course_name">Nama Mapel</label>
                            <input type="text" name="course_name" id="course_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="course_teacher">Guru Pengempu</label>
                            <input type="text" name="course_teacher" id="course_teacher" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="group_of_course">Kelompok</label>
                            <select name="group_of_course" id="group_of_course" class="form-control">
                            <option value="Kelompok A">Kelompok A</option>
                            <option value="Kelompok B">Kelompok B</option>
                            <option value="Kelompok C">Kelompok C</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        document.getElementById('group_of_course').addEventListener('change', function() {
            document.getElementById('filter_group_of_course').value = this.value;
            document.querySelector('form').submit();
        });
        </script>
@endsection
