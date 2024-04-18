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

<form method="post" action="/distributor/update">
    @csrf
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Nama Disributor</label>
    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="{{$userData->nama_distributor}}">
    </div>

    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Nomor Handphone Disributor</label>
    <input type="text" class="form-control" name="hp" placeholder="Handphone Number" value="{{$userData->no_hp_disstributor}}">
    </div>

    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Email Disributor</label>
    <input type="email" class="form-control" name="email" placeholder="Email Anda" value="{{$userData->email_distributor}}">
    </div>
    <input type="hidden" name="id"  value="{{$userData->id_distributor}}">

    <button type="sumbit" class="btn btn-primary">Simpan</button>
</form>
@endsection