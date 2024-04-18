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
            <td>Nama barang</td>
            <td>{{$userData->nama_barang}} </td>
        </tr>
        <tr>
            <td>Jumlah Barang</td>
            <td>{{$userData->jumlah_barang}}</td>
        </tr>
        <tr>
            <td>Jenis Transaksi</td>
            <td>{{$userData->jenis_transaksi}}</td>
        </tr>
        <tr>
            <td>Nama Konsumen </td>
            <td>{{$userData->nama_konsumen}}</td>
        </tr>
        <tr>
            <td>Kasir </td>
            <td>{{$userData->nama_pegawai}}</td>
        </tr>
        <tr>
            <td>Tanggal Transaksi </td>
            <td>{{$userData->tanggal_transaksi}}</td>
        </tr>   
    </table>
</div>
@endsection