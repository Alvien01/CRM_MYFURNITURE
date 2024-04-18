<!-- Menghubungkan dengan view template master -->
@extends('master')
 
<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Home')
 
 
<!-- cara penulisan isi section yang panjang -->
@section('konten')
<div>
    <table class="table table-striped table-sm">
        <tr>
            <td>Id Transaksi</td>
            <td>{{$userData->id_transaksi}} </td>
        </tr>
        <tr>
            <td>Nama Transaksi</td>
            <td>{{$userData->nama_transaksi}}</td>
        </tr>
        <tr>
            <td>Jenis Transaksi</td>
            <td>{{$userData->jenis_transaksi}}</td>
        </tr>
    </table>
</div>
@endsection