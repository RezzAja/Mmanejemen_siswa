@extends('layouts.app')
@section('content')
<section class="py-5">
    <div class="container">
        <h4 class="fw-bold mb-5">
            Tambah Transaksi wali {{$item->name}}
        </h4>
        <div class="card border-0">
            <div class="card-body p-4">
                <form action="{{route('payment.store' , $item->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
               
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="student_id">Nama</label>
                            <input type="hidden" name="student_id" id="student_id" class="form-control" value="{{$item->id}}">
                            <input type="text" class="form-control" value="{{$item->name}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                       <label for="parent_id">Nama Wali</label>
                        @foreach ($parents as $parent)
                        <input type="hidden" name="parent_id" id="parent_id" class="form-control" value="{{ $parent->id }}" required>
                        <input type="text" class="form-control" value="{{ $parent->name }}" disabled>
                        @endforeach
                   </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="classroom_id">Kelas</label>
                            <input type="hidden" name="classroom_id" id="classroom_id" class="form-control" value="{{$item->id}}" required >
                            <input type="text" class="form-control" value="{{$item->classroom->classroom_name}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="spp_id">Type Pembayaran</label>
                           
                            <select name="spp_id" id="spp_id" class="form-control">
                                <option value="">Pilih Type Pembayaran</option>
                            @foreach ($payment as $payments)
                                <option value="{{ $payments->id }}">{{ $payments->name_spp }}</option>
                            @endforeach
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="spp_id">Nominal</label>
                            <select name="spp_id" id="spp_id" class="form-control">
                                <option value="">Pilih Nominal</option>
                            @foreach ($payment as $payments)
                                <option value="{{ $payments->id }}">{{ $payments->nominal }}</option>
                            @endforeach
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="spp_id">Kategori</label>
                           
                            <select name="spp_id" id="spp_id" class="form-control">
                                <option value="">Pilih Kategori</option>
                            @foreach ($payment as $payments)
                                <option value="{{ $payments->id }}">{{ $payments->payment_type }}</option>
                            @endforeach
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="metode_payment">Pilihan</label>
                            <select name="metode_payment" id="metode_payment" class="form-control">
                                <option value="Credit" >Credit</option>
                                <option value="Transfer" >Transfer</option>
                                <option value="Cash" >Cash</option>
                            </select>
                        </div>
                    </div>
                    
                    
                
                                
            
                              </select>
                        </div>
                    </div>
                     
                        
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('siswa.index')}}" class="btn btn-secondary">Batal</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection