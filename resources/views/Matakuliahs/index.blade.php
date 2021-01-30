@extends('layouts.app')

@section('title' , 'Mata Kuliah')

@section('content')
<button type="button" data-toggle="modal" data-target=".bd-example-modal-lg" href="/matakuliahs/create" class="card-link btn btn-primary">Tambah Mata Kuliah</button>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action ="/matakuliahs" method="POST">
        @csrf
      
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Mata Kuliah</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="nama_matakuliah" aria-describedby="emailHelp" value="{{ old('nama_matakuliah') }}">
          @error('nama_matakuliah')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">SKS</label>
          <input type="text" class="form-control" name="sks" id="exampleInputPassword1" value="{{ old('sks') }}">
          @error('sks')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>

@foreach ($matakuliahs as $mk)

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <a href="/matakuliahs/{{$mk['id']}}" class="card-title">{{ $mk['nama_matakuliah'] }}</a>
      <p class="card-text">{{ $mk['description'] }}</p>
        <hr>
        <a href="/matakuliahs/addmember/{{$mk['id']}}" class="card-link">Tambah Anggota Mahasiswa</a>
        <ul class="list-mk">
          @foreach ($mk->mahasiswas as $mhs)
          
              <li class="list-mk-item d-flex justify-content-between align-items-center">
              {{$mhs->nama_mahasiswa}}
              <form action="/matakuliahs/deleteaddmember/{{ $mhs->id }}" method="POST">
                @csrf
                @method('PUT')
                  <button type = "submit" class="bedge card-link btn-danger">X</button>
                </form>              
                </li>

          @endforeach
        </ul>
        <hr>
    <a href="/matakuliahs/{{$mk['id']}}/edit" class="card-link">Edit Mata Kuliah</a>
    <form action="/matakuliahs/{{ $mk['id'] }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="card-link btn btn-danger">Delete Mata Kuliah</button>
    </form>
  </div>
</div>
@endforeach
<div>
{{ $matakuliahs->links() }}
</div>
@endsection