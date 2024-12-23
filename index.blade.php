@extends('adminlte::page')
@section('title', 'Data Mahasantri')
@section('content_header')
<h3 class="fa fa-graduation-cap" > Data Mahasantri</h3>
@stop
@section('content')
@php
$ar_tabel = ['No','Nama','NIM','Jurusan','Mata Kuliah','Dosen Pengajar','Action'];
$no = 1;
@endphp
<a class="btn btn-primary" href="{{ route('mahasantri.create') }}"
role="button">Tambah</a><br/><br/>
<table class="table table-striped">
<thead>
<tr>
@foreach($ar_tabel as $jdl)
<th>{{ $jdl }}</th>
@endforeach
</tr>   
</thead> 
<tbody>
@foreach($ar_mahasantri as $mhs)
<tr>
<td>{{ $no++ }}</td>
<td>{{ $mhs->nama}}</td>
<td>{{ $mhs->nim }}</td>
<td>{{ $mhs->pen}}</td>
<td>{{ $mhs->mt}}</td>
<td>{{ $mhs->dos}}</td>
<td>
    <form method="POST" action="{{ route('mahasantri.destroy', $mhs->id) }}">
        @csrf {{--security untuk menghindari dari serangan pada saat input form--}}
        @method('delete') {{--method delete digunakan untuk menghapus data--}}
        <a class="btn btn-info" href="{{ route('mahasantri.show',$mhs->id )}}">Detail</a>
        <a class="btn btn-success"href="{{ route('mahasantri.edit',$mhs->id )}}">Edit</a>
        <button class="btn btn-danger" onclick="return confirm('Anda Yakin Data Dihapus?')">Hapus</button>
    </form>
</td>
@endforeach
</tbody>
</table>
@stop
@section('css')
<link rel="stylesheet" href="css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi'); </script>
@stop