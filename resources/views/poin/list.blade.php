@extends('master')
 
<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Home')
 
 
<!-- cara penulisan isi section yang panjang -->
@section('konten')
 
@if (session('status'))
<div class="alert alert-success" role="alert">
	<button type="button" class="close" data-dismiss="alert">×</button>
	{{ session('status') }}
</div>
@endif

@if(session('failed'))
<div class="alert alert-danger" role="alert">
	<button type="button" class="close" data-dismiss="alert">×</button>
	{{ session('failed') }}
</div>
@endif

<!-- isi bagian konten -->
<a href="/poin/create" class="btn btn-success mb-3">Tambah Data</a>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nama Konsumen</th>
              <th scope="col"> Jumlah Poin</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
            @foreach ($data as $item)
              <td class="align-middle">{{$item->id_poin}}</td>
              <td class="align-middle">{{$item->konsumen->nama_konsumen}}</td>
              <td class="align-middle">{{$item->jumlah_poin}}</td>
              <td>
                <a href="/poin/{{$item->id_poin}}" class="btn btn-primary btn-sm">View</a>
                <a href="/poin/edit/{{$item->id_poin}}" class="btn btn-info btn-sm">Edit</a>
                <a href="/poin/delete/{{$item->id_poin}}" class="btn btn-danger btn-sm">Hapus</a>
            </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

@endsection