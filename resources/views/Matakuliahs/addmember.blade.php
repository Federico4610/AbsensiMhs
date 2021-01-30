@extends('layouts.app')

@section('title' , 'Mata Kuliah')

@section('content')
  <form action ="/matakuliahs/addmember/{{$matakuliahs -> id}}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Nama</label>
      <select class="form-select" aria-label="Default select example" name="mahasiswas_id">
        <option selected>Pilih mahasiswa untuk dimasukan ke matakuliah</option>
        @foreach ($mhs as $m)
          <option value="{{$m -> id}}">{{$m -> nama_mahasiswa}}</option>
        @endforeach

      </select>
  </div>
  <button type="submit" class="btn btn-primary">Tambah ke Mata Kuliah</button>
</form>



@endsection