<!DOCTYPE html>
<html lang="en"

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widht=device-widht, initial-scale=1.0">
    <meta http-equiv="X-UA Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token () }}">
    <style>
        table.static{
            position: relative;
            border: 1px solid #543535;
        }
    </style>
    <title>CRM Furniture</title>
</head>
<body>
    <div class="form-group">
        <p style="text-align:center; font-weight:bold; font-size:x-large" >Laporan Data Barang<b></p>
        <!-- border="1px style="width: 95%;" align="center" -->
        <table class="static" style="border:1px; width:95%" rules="all">
        <tr style="text-align:center;">
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jenis Barang</th>
            <th>Harga Barang</th>
            <th>Stock</th>
            <th>Disributor</th>
        </tr>
    @foreach ($barang as $item)
    <tr>
        <td style="text-align:center;">{{ $loop->iteration }}</td>
        <td>{{ $item->nama_barang }}</td>
        <td>{{ $item->jenis_barang }}</td>
        <td>{{ $item->harga_barang }}</td>
        <td>{{ $item->stock }}</td>
        <td>{{ $item->nama_distributor }}</td>
    </tr>
    @endforeach
    </table>
    </div>