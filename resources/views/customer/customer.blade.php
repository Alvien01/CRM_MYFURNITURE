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
            <td>Id customer</td>
            <td>{{$userData->id_customer}} </td>
        </tr>
        <tr>
            <td>Nama Customer</td>
            <td>{{$userData->nama_customer}}</td>
        </tr>
        <tr>
            <td>Nomor Hp </td>
            <td>{{$userData->no_hp_customer}}</td>
        </tr>
        <tr>
            <td>Email Customer </td>
            <td>{{$userData->email_customer}}</td>
        </tr>
    </table>
</div>
@endsection