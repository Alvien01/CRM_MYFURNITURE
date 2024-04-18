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
            <td>Id Disributor</td>
            <td>{{$userData->id_distributor}} </td>
        </tr>
        <tr>
            <td>Nama Disributor</td>
            <td>{{$userData->nama_distributor}}</td>
        </tr>
        <tr>
            <td>Nomor Hp </td>
            <td>{{$userData->no_hp_distributor}}</td>
        </tr>
        <tr>
            <td>Email Disributor </td>
            <td>{{$userData->email_distributor}}</td>
        </tr>
    </table>
</div>
@endsection