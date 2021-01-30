@extends('layouts.app')

@section('title' , 'Detail')

@section('content')
<div class="card">
    <div class="card-body">
        <h3>Nama : {{$mahasiswas['nama_mahasiswa']}} </h3>
        <h3>Alamat : {{$mahasiswas['alamat']}} </h3>
        <h3>No Telp : {{$mahasiswas['no_telp']}} </h3>
        <h3>Email : {{$mahasiswas['email']}} </h3>

    </div>
</div>
@endsection


