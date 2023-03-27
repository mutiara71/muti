@extends('adminlte::page')
@section('title', 'Halaman Pengaduan')
@section('content_header')
   <h1>Tambah pengaduan</h1>
@stop
@section('link')
<li class="breadcrumb-item"><a href="{{route('pengaduan.index')}}">Pengaduan</a></li>
<li class="breadcrumb-item active">Tambah</li>
@stop
@section('content')
<div class="card">
   <div class="card-body">
       <form method="POST" action="{{ route('pengaduan.store') }}" enctype="multipart/form-data">
           @csrf
           <div class="row mb-3">
               <label for="nama" class="col-md-4 col-form-label text-mdend">{{ __('Nama') }}</label>
                   <div class="col-md-6">
                       <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>
                           @error('nama')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                   </div>
           </div>
           <div class="row mb-3">
               <label for="isi_laporan" class="col-md-4 col-form-label textmd-end">{{ __('Isi Laporan') }}</label>
                   <div class="col-md-6">
                       <textarea name="isi_laporan" class="form-control @error('isi_laporan') is-invalid @enderror" >{{old('isi_laporan')}}</textarea>
                           @error('isi_laporan')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                   </div>
           </div>
           </div>
           <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                   <button type="submit" class="btn btn-primary">
                                   Kirim
                   </button>
                   <br/><br/>
                </div>
           </div>
           
   </form>
   </div>
</div>
@endsection