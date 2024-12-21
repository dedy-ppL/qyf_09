@extends('adminlte::page')
@section('title', 'Data Pengarang')
@section('content_header')
<h3 class="fa fa-address-book"> Data Pengarang</h3>
@stop
@section('content')
@if (session('success'))
<div class="alert alert-info">
    {{session('success')}}
</div>
@endif
@php
$ar_judul = ['No','Nama','E-mail','HP','Foto'];
$no = 1;
@endphp
<a class="btn btn-primary" href="{{ route('pengarang.create') }}"
role="button">Tambah pengarang</a><br/><br/>
<table class="table table-striped">
<thead>
<tr>
@foreach($ar_judul as $jdl)
<th>{{ $jdl }}</th>
@endforeach
</tr>
</thead> 
<tbody>
@foreach($ar_pen as $p)
<tr>
<td>{{ $no++ }}</td>
<td>{{ $p->nama }}</td>
<td>{{ $p->email }}</td>
<td>{{ $p->hp }}</td>
<td>{{ $p->foto }}</td>
<td>
    <form method="POST" action="{{ route('pengarang.destroy',$p->id) }}">
        @csrf {{--security untuk menghindari dari serangan pada saat input form--}}
        @method('delete') {{--method delete digunakan untuk menghapus data--}}
        <a class="btn btn-info" href="{{ route('pengarang.show',$p->id )}}">Detail</a>
        <a class="btn btn-success"href="{{ route('pengarang.edit',$p->id )}}">Edit</a>
        <button class="btn btn-danger" onclick="return confirm('Anda Yakin Data Dihapus?')">Hapus</button>
    </form>
</td>
</tr>
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