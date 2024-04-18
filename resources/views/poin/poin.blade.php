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
            <td>Id konsumen</td>
            <td>{{$userData->id_konsumen}} </td>
        </tr>
        <tr>
            <td>Jumlah Poin</td>
            <td>{{$userData->jumlah_poin}}</td>
    </table>
</div>
@endsection