@extends('layouts.app')

@section('title' , 'Mata Kuliah')

@section('content')
  <form action ="/matakuliahs/{{ $matakuliahs['id'] }}" method="POST">
  @csrf
  @method('PUT')
  
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Mata Kuliah</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_matakuliah" aria-describedby="emailHelp" value="{{ old('nama_matakuliah') ? old('nama_matakuliah') : $matakuliahs['nama_matakuliah'] }}">
    @error('nama_matakuliah')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">SKS</label>
    <input type="text" class="form-control" name="sks" id="exampleInputPassword1" value="{{ old('sks') ? old('sks') : $matakuliahs['sks'] }}">
    @error('sks')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection