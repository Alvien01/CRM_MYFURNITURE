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

<form method="post" action="/transaksiconsumer/update">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nama Konsumen</label>
        <select class="form-select" name="id_konsumen"> 
        <option selected disabled>Pilih Konsumen</option>
            @foreach($datakonsumen as $item)
                <option value='{{$item->id_konsumen}}' 
                @if($item->id_konsumen == $userData->id_konsumen)
                selected
                @endif
                >{{$item->nama_konsumen}}</option>
            @endforeach
        </select>
    </div>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
        <select class="form-select" name="id_barang"> 
        <option selected disabled>Pilih Barang</option>
            @foreach($databarang as $item)
                <option value='{{$item->id_barang}}'
                @if($item->id_barang == $userData->id_barang)
                selected
                @endif
                >{{$item->nama_barang}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Jenis Transaksi</label>
        <select class="form-select" name="id_transaksi"> 
        <option selected disabled>Jenis Transaksi</option>
            @foreach($datatransaksi as $item)
                <option value='{{$item->id_transaksi}}'
                @if($item->id_transaksi == $userData->id_transaksi)
                selected
                @endif
                >{{$item->nama_transaksi}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Kasir</label>
        <select class="form-select" name="id_pegawai"> 
        <option selected disabled>Kasir</option>
            @foreach($datapegawai as $item)
                <option value='{{$item->id_pegawai}}'
                @if($item->id_pegawai == $userData->id_pegawai)
                selected
                @endif
                >{{$item->nama_pegawai}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Jumlah Barang</label>
        <input type="number" class="form-control" name="jumlah_barang" placeholder="Jumlah Barang" value="{{$userData->jumlah_barang}}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Tanggal Transaksi</label>
        <input type="date" class="form-control" name="tanggal_transaksi" placeholder="Tanggal Transaksi" value="{{$userData->tanggal_transaksi}}">
    </div>
    <input type="hidden" name="id" value="{{$userData->id_transaksi_konsumen}}">
    <button type="sumbit" class="btn btn-primary">Simpan</button>
</form>
@endsection