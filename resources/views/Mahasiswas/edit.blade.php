@extends('layouts.app')

@section('title' , 'Mahasiswa')

@section('content')
  <form action ="/mahasiswas/{{ $mahasiswas['id'] }}" method="POST">
  @csrf
  @method('PUT')
  
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Mahasiswa</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_mahasiswa" aria-describedby="emailHelp" value="{{ old('nama_mahasiswa') ? old('nama_mahasiswa') : $mahasiswas['nama_mahasiswa'] }}">
    @error('nama_mahasiswa')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Alamat</label>
    <input type="text" class="form-control" name="alamat" id="exampleInputPassword1" value="{{ old('alamat') ? old('alamat') : $mahasiswas['alamat'] }}">
    @error('alamat')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nomor Telpon</label>
    <input type="text" class="form-control" name="no_telp" id="exampleInputPassword1" value="{{ old('no_telp') ? old('no_telp') : $mahasiswas['no_telp'] }}">
    @error('no_telp')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="text" class="form-control" name="email" id="exampleInputPassword1" value="{{ old('email') ? old('email') : $mahasiswas['email'] }}">
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection