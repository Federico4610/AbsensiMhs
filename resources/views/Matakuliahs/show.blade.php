@extends('layouts.app')

@section('title' , 'Detail')

@section('content')
<div class="card">
    <div class="card-body">
        <h3>Nama : {{$matakuliahs['nama_matakuliah']}} </h3>
        <h3>SKS : {{$matakuliahs['sks']}} </h3>

    </div>
</div>
@endsection


