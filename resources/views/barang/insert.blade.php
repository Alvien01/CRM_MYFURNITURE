@extends('master')
 
<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Home')
 
 
<!-- cara penulisan isi section yang panjang -->
@section('konten')

@if(session('failed'))
<div class="alert alert-danger" role="alert">
	<button type="button" class="close" data-dismiss="alert">×</button>
	{{ session('failed') }}
</div>
@endif

@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="post" action="/barang/store">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
        <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang">
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Jenis Barang</label>
        <input type="text" class="form-control" name="jenis_barang" placeholder="Jenis Barang">
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Harga Barang</label>
        <input type="text" class="form-control" name="harga_barang" placeholder="Harga Barang">
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Stock</label>
        <input type="text" class="form-control" name="stock" placeholder="Stock">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Disributor</label>
        <select class="form-select" name="id_distributor"> 
            <option selected disabled>Pilih distributor</option>
            @foreach($data as $item)
                <option value='{{$item->id_distributor}}'>{{$item->nama_distributor}}</option>
            @endforeach
        </select>
    </div>
    <button type="sumbit" class="btn btn-primary">Simpan</button>
</form>
@endsection