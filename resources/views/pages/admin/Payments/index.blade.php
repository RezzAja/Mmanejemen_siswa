@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between mb-5">
            <h4 class="fw-bold ">Data Transaksi Wali {{ $item->name }}</h4>
            {{-- <a href="{{ route('payment.create', $item->id)}}" class="btn btn-primary d-flex align-items-center gap-2">
                <i class="bx bx-plus"></i> Tambah Transaksi
            </a> --}}
        </div>
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-body text-canter mb-4">
                        <header>
                            <h5 class="card-title fw-bold mb-2">
                                Biodata Siswa
                            </h5>
                        </header>
                        <img src="{{ url('storage/'.$item->photo) }}" alt="" width="110" height="120" class="mt-3" srcset="">
                       <h5 class="card-title fw-bold mt-2">
                        {{ $item->name }}
                       </h5>
                       <p class="card-title fw-bold mt-2">
                        {{ $item->nisn }}
                       </p>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="table-responsive" >
                    <table class="table table-hover table-stiped">
                            <tr>
                                <th>Nisn</th>
                                <td>:{{ $item->nisn }}</td>
                                <tr>
                                <th>Name</th>
                                <td>:{{ $item->name }}</td>
                                <tr>
                                <th>Wali</th>
                                @foreach ($parents as $parent )
                                    
                                <td>:{{ $parent->name }}</td>
                                @endforeach
                                <tr>
                                <th>gender</th>
                                <td>:{{ $item->gender }}</td>
                                <tr>
                                <th>Kelas</th>
                                <td>:{{ $item->classroom->classroom_name  }}</td>
                                
                            </tr>
                    </table>
                    <a href="{{ route('payment.create', $item->id)}}" class="btn btn-info d-flex align-items-center gap-2 mt-3d">
                        <i class="bx bx-book"></i> Tambah Riwayat  Transaksi
                    </a>
                </div>
            </div>
        </div>
        <div class="table-responsive mt-4" style="border-radius: 20px" >
            <table class="table table-hover table-striped ">
                <thead>
                    <h4>Riwayat Trasaksi</h4>
                    <tr style="vertical-align: middle" > 
                        <th>No</th>
                        <th>Nama </th>
                        <th>Nama Wali </th>
                        <th>Bulan Pembayaran</th> 
                        <th>Nominal Yang di bayar</th> 
                        <th>Kategori</th>
                        <th>Metode Pembayaran</th>
                        <th>Tanggal Transaksi</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($item->spp as $key => $spp)
                    <tr>
    
                        <td>{{++$key}}</td>
                        
                        <td>{{$item->name}}</td>
                        <td>{{$parents->first()->name}}</td>
                        <td>{{$spp->spp->name_spp}}</td>
                        <td>{{$spp->spp->nominal}}</td>
                        <td>{{$spp->spp->payment_type}}</td>
                        <td>{{$spp->metode_payment}}</td>
                        <td>{{$spp->created_at}}</td>
                        <td><form action="{{ route('payment.destroy', $item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger px-4 align-items-center" type="submit" onclick="return confirm('Apakah kamu yakin ingin menghapusnya?')">
                                <i class='bx bx-message-x' ></i> Hapus
                            </button>
                        </form>
                    </td>
                        
                        
                    @endforeach
                </tbody> 


            
            
        
    </div>
    

</section>
@endsection
