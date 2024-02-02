@extends('layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between mb-5">
                <h4 class="fw-bold ">Daftar Spp</h4>
                <button type="button" data-bs-toggle="modal" data-bs-target="#addModal"
                    class="btn btn-primary d-flex align-items-center gap-2">
                    <i class="bx bx-plus"></i> Tambah Spps
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
                            <th>Nama Spp</th>
                            <th>Deskripsi</th>
                            <th>Kategori</th>
                            <th>Nominal</th>
                            <th>Kelas Industri</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $key => $item)
                            <tr>

                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->name_spp }}</td>
                                <td>{{ $item->desc }}</td>
                                @if ( $item->payment_type == 'bulanan')
                                <td><span class="badge bg-succes">Bulanan</span></td>
                                @else
                                <td><span class="badge bg-info">Tahunan</span></td>
                                    
                                @endif
                                <td> Rp.{{ $item->nominal }}</td>
                                <td> Rp.{{ $item->industrial_class }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-sm btn-warning px-4" type="button" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $item->id }}"> 
                                            Edit
                                        </button>
                                        <form action="{{ route('spp.destroy', $item->id) }}" method="POST">
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
                                            <h5 class="modal-title"> Spp {{ $item->name}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('spp.update', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="name_spp">Nama spp</label>
                                                    <input type="text" name="name_spp" id="name_spp"
                                                        class="form-control"  required">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="desc">Deskripsi</label>
                                                    <textarea name="desc" id="desc" cols="30" rows="3" class="form-control">{{ $item->desc }}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="payment_type">Kategori</label>
                                                    <select name="payment_type" id="Pament_type" class="form-control">
                                                        <option value="bulanan" {{ $item->payment_type =='bulanan' ? 'SELCTED': '' }}>Bulanan</option>
                                                        <option value="tahunan" {{ $item->payment_type =='tahunan' ? 'SELCTED': '' }}>Tahunan</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nominal" class="form-label">Nominal</label>
                                                    <input name="nominal" id="nominal"  class="form-control" value="{{ $item->nominal}}" required >
                                                </div>
                                                <div class="mb-3">
                                                    <label for="industrial_class" class="form-label">Kelas Industri</label>
                                                    <input name="industrial_class" id="industrial_class"  class="form-control" value="{{ $item->industrial_class}}" required >
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
                    <h5 class="modal-title">Tambah spp Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                  <div class="modal-body">
                    <form action="{{ route('spp.store') }}" method="POST">
                       @csrf
                        <div class="mb-3">
                            <label for="name_spp">Nama spp</label>
                            <input type="text" name="name_spp" id="name_spp" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="desc">Deskripsi</label>
                            <textarea name="desc" id="desc" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="payment_type">Pilihan</label>
                            <select name="payment_type" id="Payment_type" class="form-control">
                                <option value="bulanan" >Bulanan</option>
                                <option value="tahunan" >Tahunan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nominal" class="form-label">Nominal</label>
                            <input name="nominal" id="nominal"  class="form-control" placeholder="Nominal Pembayaran" required >
                        </div>
                        <div class="mb-3">
                            <label for="industrial_class" class="form-label">Kelas Industri</label>
                            <input name="industrial_class" id="industrial_class"  class="form-control" placeholder="Nomnial Pembayaran Kelas Industri"  required >
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
