@extends('layouts.app')

@section('content')
<section class="py-5" >
    <div class="container">
        <h1 class="fw-bold mb-5">Selamat Datang, {{ Auth::user()->name }}</h1>
        <div class="row" >
            <div class="col-md-3 lengkung" style="background-color: rgb(0, 0, 0);">
                <div class="card border-light-subtle mb-4 " >
                    <div class="card-body p-4" > 
                        <i class="bx bxs-user-badge fs-1 text-primary"></i>
                        <h5 class="text-dark mt-3 "> {{ ($jumlah_siswa) }} siswa</h5>
                        <p class="mb-0 text-secondary">Jumlah Seluruh Siswa Saat Ini</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 lengkung" style="background-color: rgb(203, 203, 203);">
                <div class="card border-light-subtle mb-4">
                    <div class="card-body p-4">
                        <i class='bx bx-building-house fs-1 text-primary'></i>
                        <h5 class="text-dark mt-3 ">{{($jumlah_kelas)}} Kelas</h5>
                        <p class="mb-0 text-secondary">Jumlah Seluruh Kelas Saat Ini</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 lengkung" style="background-color: rgb(0, 0, 0);">
                <div class="card border-light-subtle mb-4">
                    <div class="card-body p-4">
                        <i class='bx bx-user-pin fs-1 text-primary'></i>
                        <h5 class="text-dark mt-3 ">{{($jumlah_guru)}} Guru</h5></h5>
                        <p class="mb-0 text-secondary">Jumlah Guru Pengajar Saat Ini</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 lengkung" style="background-color: rgb(203, 203, 203);">
                <div class="card border-light-subtle mb-4">
                    <div class="card-body p-4">
                        <i class='bx bx-notepad fs-1 text-primary'></i>
                        <h5 class="text-dark mt-3 ">{{$jumlah_mapel}} Mapel</h5>
                        <p class="mb-0 text-secondary">Jumlah Mata Pelajaran Saat Ini</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection
