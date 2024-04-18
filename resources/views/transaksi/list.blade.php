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
<a href="/transaksi/create" class="btn btn-success mb-3">Tambah Data</a>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nama Transaksi</th>
              <th scope="col">Jenis Transaksi</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $item)
            <tr>
              <td class="align-middle">{{$item->id_transaksi}}</td>
              <td class="align-middle">{{$item->nama_transaksi}}</td>
              <td class="align-middle">{{$item->jenis_transaksi}}</td>
              <td>
                <a href="/transaksi/{{$item->id_transaksi}}" class="btn btn-primary btn-sm">View</a>
                <a href="/transaksi/edit/{{$item->id_transaksi}}" class="btn btn-info btn-sm">Edit</a>
                <a href="/transaksi/delete/{{$item->id_transaksi}}" class="btn btn-danger btn-sm">Hapus</a>
            </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

@endsection