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
<a href="/pegawai/create" class="btn btn-success mb-3">Tambah Data</a>
<a href="{{ url('/cetak-pegawai') }}" class="btn btn-dark mb-3">Export</a>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nama Pegawai</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $item)
            <tr>
              <td class="align-middle">{{$item->id_pegawai}}</td>
              <td class="align-middle">{{$item->nama_pegawai}}</td>
              <td>
                <a href="/pegawai/{{$item->id_pegawai}}" class="btn btn-primary btn-sm">View</a>
                <a href="/pegawai/edit/{{$item->id_pegawai}}" class="btn btn-info btn-sm">Edit</a>
                <a href="/pegawai/delete/{{$item->id_pegawai}}" class="btn btn-danger btn-sm">Hapus</a>
            </td>
              
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

@endsection