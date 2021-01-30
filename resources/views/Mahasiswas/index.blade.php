@extends('layouts.app')

@section('title' , 'Mahasiswa')

@section('content')
<button type="button" data-toggle="modal" data-target=".bd-example-modal-lg" href="/mahasiswas/create" class="card-link btn btn-primary">Tambah Data Mahasiswa</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action ="/mahasiswas" method="POST">
  @csrf
  
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Mahasiswa</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_mahasiswa" aria-describedby="emailHelp" value="{{ old('nama_mahasiswa') }}">
    @error('nama_mahasiswa')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Alamat</label>
    <input type="text" class="form-control" name="alamat" id="exampleInputPassword1" value="{{ old('alamat') }}">
    @error('alamat')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nomor Telpon</label>
    <input type="text" class="form-control" name="no_telp" id="exampleInputPassword1" value="{{ old('no_telp') }}">
    @error('no_telp')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="text" class="form-control" name="email" id="exampleInputPassword1" value="{{ old('email') }}">
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
  </div>
</div>

@foreach ($mahasiswas as $mhs)

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <a href="/mahasiswas/{{$mhs['id']}}" class="card-title">{{ $mhs['nama_mahasiswa'] }}</a>
    <p class="card-text">{{ $mhs['alamat'] }}</p>
    <h6 class="card-subtitle mb-2 text-muted">{{ $mhs['no_telp'] }}</h6>
    <p class="card-text">{{ $mhs['email'] }}</p>


    <a href="/mahasiswas/{{$mhs['id']}}/edit" class="card-link">Edit Data Mahasiswa</a>
    <form action="/mahasiswas/{{ $mhs['id'] }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="card-link btn btn-danger">Delete Data Mahasiswa</button>
    </form>
  </div>
</div>
@endforeach
<div>
{{ $mahasiswas->links() }}
</div>
@endsection