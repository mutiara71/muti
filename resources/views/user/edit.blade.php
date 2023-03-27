@extends('adminlte::page')
@section('title', 'Halaman Edit User')
@section('content_header')
   <h1>Edit User</h1>
@stop
@section('link')
<li class="breadcrumb-item"><a href="{{route('user.index')}}">User</a></li>
<li class="breadcrumb-item">Edit</li>
<li class="breadcrumb-item active">{{$user->username}}</li>
@stop
@section('content')
<div class="card">
   <div class="card-body">
       <form method="POST" action="{{ route('user.update',$user->id) }}" >
           @csrf
           @method('PUT')
           <br/>
           <div class="row mb-3">
               <label for="username" class="col-md-4 col-form-label text-mdend">{{ __('Username') }}</label>
                   <div class="col-md-6">
                       <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{$user->username}}" required autocomplete="name" autofocus>
                           @error('username')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                   </div>
           </div>
           <div class="row mb-3">
               <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                   <div class="col-md-6">
                       <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name}}" required autocomplete="name" autofocus>
                           @error('name')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                   </div>
           </div>
           <div class="row mb-3">
               <label for="tlp" class="col-md-4 col-form-label text-md-end">{{ __('No. Telepon') }}</label>
                   <div class="col-md-6">
                       <input id="tlp" type="text" class="form-control @error('tlp') is-invalid @enderror" name="tlp" value="{{ $user->tlp}}" required autocomplete="tlp" autofocus>
                           @error('tlp')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                   </div>
           </div>
           <div class="row mb-3">
               <label for="email" class="col-md-4 col-form-label text-mdend">{{ __('Email Address') }}</label>
                   <div class="col-md-6">
                       <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
                           @error('email')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                   </div>
           </div>

           <div class="row mb-3">
               <label for="password" class="col-md-4 col-form-label text-mdend">{{ __('Password') }}</label>
                   <div class="col-md-6">
                       <input id="password" type="password" class="formcontrol @error('password') is-invalid @enderror" name="password" >
                       <span class="help-text text-danger">Kosongkan jika tidak ada perubahan</span>
                           @error('password')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                   </div>
           </div>
           <div class="row mb-3">
               <label for="level" class="col-md-4 col-form-label text-mdend">{{ __('Level') }}</label>
                   <div class="col-md-6">
                       <select id="level" class="form-control @error('level') is-invalid @enderror" name="level" required >
                           <option value="{{$user->level}}"> {{ucfirst($user->level)}}</option>
                           <option value="admin"> Admin </option>
                           <option value="petugas"> Petugas </option>
                           <option value="masyarakat"> Masyarakat </option>
                       </select>

                           @error('level')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                   </div>
           </div>
           <div class="row mb-0">
               <div class="col-md-6 offset-md-4">
                   <button type="submit" class="btn btn-primary">
                                 Perbarui
                   </button>
           </div>
       </div>
   </form>
   </div>
</div>
@endsection