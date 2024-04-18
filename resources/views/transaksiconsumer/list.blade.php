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
<a href="/transaksiconsumer/create" class="btn btn-success mb-3">Tambah Data</a>
<a href="{{ url('/cetak-transaksiconsumer') }}" class="btn btn-success mb-3">Export</a>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nama Konsumen</th>
              <th scope="col"> Nama Barang</th>
              <th scope="col"> Total Harga</th>
              <th scope="col"> Tanggal Transaksi</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
             @foreach ($data as $item)
            <tr>
              <td class="align-middle">{{$item->id_transaksi_konsumen}}</td>
              <td class="align-middle">{{$item->Konsumen->nama_konsumen}}</td>
              <td class="align-middle">{{$item->Barang->nama_barang}}</td>
              <td class="align-middle">Rp {{number_format($item->total_harga, 0, ',', '.')}}</td>
              <td class="align-middle">{{$item->tanggal_transaksi}}</td>
              <td>
                <a href="/transaksiconsumer/{{$item->id_transaksi_konsumen}}" class="btn btn-primary btn-sm">View</a>
                <a href="/transaksiconsumer/edit/{{$item->id_transaksi_konsumen}}" class="btn btn-info btn-sm">Edit</a>
                <a href="/transaksiconsumer/delete/{{$item->id_transaksi_konsumen}}" class="btn btn-danger btn-sm">Hapus</a>
            </td>
              
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

@endsection