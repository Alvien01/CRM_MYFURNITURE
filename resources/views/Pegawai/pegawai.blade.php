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
            <td>Id pegawai</td>
            <td>{{$userData->id_pegawai}} </td>
        </tr>
        <tr>
            <td>Nama Pegawai</td>
            <td>{{$userData->nama_pegawai}}</td>
        </tr>
        <tr>
            <td>Nomor Hp </td>
            <td>{{$userData->no_hp_pegawai}}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{$userData->email_pegawai}}</td>
        </tr>
    </table>
</div>
@endsection