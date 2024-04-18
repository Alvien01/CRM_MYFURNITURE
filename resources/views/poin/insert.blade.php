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

<form method="post" action="/poin/store">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nama Konsumen</label>
        <select class="form-select" name="id_konsumen"> 
            <option selected disabled>Pilih Konsumen</option>
            @foreach($konsumen as $item)            
                <option value='{{$item->id_konsumen}}'>{{$item->nama_konsumen}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Jumlah Poin</label>
        <input type="number" class="form-control" name="jumlah_poin" placeholder="Jumlah Poin">
    </div>
    <button type="sumbit" class="btn btn-primary">Simpan</button>
</form>
@endsection