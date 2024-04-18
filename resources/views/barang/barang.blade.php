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
            <td>Id Barang</td>
            <td>{{$userData->id_barang}} </td>
        </tr>
        <tr>
            <td>Nama Barang</td>
            <td>{{$userData->nama_barang}}</td>
        </tr>
        <tr>
            <td>Jenis Barang</td>
            <td>{{$userData->jenis_barang}} </td>
        </tr>
        <tr>
            <td>Harga Barang </td>
            <td>{{$userData->harga_barang}}</td>
        </tr>
        <tr>
            <td>Stock </td>
            <td>{{$userData->stock}}</td>
        </tr>
        <tr>
            <td>Disributor </td>
            <td>{{$userData->id_distributor}}</td>
        </tr>
    </table>
</div>
@endsection