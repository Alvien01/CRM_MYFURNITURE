<!-- Menghubungkan dengan view template master -->
@extends('master')
 
<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Home')
 
 
<!-- cara penulisan isi section yang panjang -->
@section('konten')
<div>
    <table>
        <tr>
            <td>Id customer</td>
            <td>{{$userData->id_customer}} </td>
        </tr>
        <tr>
            <td>Id Consumer</td>
            <td>{{$userData->id_cunsomer}}</td>
        </tr>
        <tr>
            <td>Tanggal Transaksi </td>
            <td>{{$userData->tanggal_transaksi}}</td>
        </tr>
    </table>
</div>
@endsection