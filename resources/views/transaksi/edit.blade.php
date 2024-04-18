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

<form method="post" action="/transaksi/update">
    @csrf
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Nama Transaksi</label>
    <input type="text" class="form-control" name="nama_transaksi" placeholder="Nama Transaksi" value="{{$userData->nama_transaksi}}">
    </div>

    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Jenis Transaksi</label>
    <input type="text" class="form-control" name="jenis_transaksi" placeholder="jenis_Transaksi" value="{{$userData->jenis_transaksi}}">
    </div>
    <input type="hidden" name="id"  value="{{$userData->id_transaksi}}">
    <button type="sumbit" class="btn btn-primary">Simpan</button>
</form>
@endsection