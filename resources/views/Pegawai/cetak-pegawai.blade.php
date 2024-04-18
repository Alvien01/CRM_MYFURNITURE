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
        <p style="text-align:center; font-weight:bold; font-size:x-large" >Laporan Data Pegawai<b></p>
        <!-- border="1px style="width: 95%;" align="center" -->
        <table class="static" style="border:1px; width:95%" rules="all">
        <tr style="text-align:center;">
            <th>No</th>
            <th>Nama Pegawai</th>
            <th>No Handphone</th>
            <th>Email</th>
        </tr>
    @foreach ($pegawai as $item)
    <tr>
        <td style="text-align:center;">{{ $loop->iteration }}</td>
        <td>{{ $item->nama_pegawai }}</td>
        <td>{{ $item->no_hp_pegawai }}</td>
        <td>{{ $item->email_pegawai }}</td>
    </tr>
    @endforeach
    </table>
    </div>