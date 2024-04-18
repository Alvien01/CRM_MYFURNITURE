@extends('master')
@section('konten')
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
          <div class="card-header">Barang</div>
          <div class="card-body">
            <h5 class="card-title">Banyak Barang</h5>
            <p class="card-text">{{$barang}}</p>
          </div>
        </div>
    </div>
    <div class="col-md-3">
    <div class="card text-bg-info mb-3 " style="max-width: 18rem;">
          <div class="card-header">Pegawai</div>
          <div class="card-body">
            <h5 class="card-title">Jumlah Pegawai</h5>
            <p class="card-text">{{$pegawai}}</p>
          </div>
        </div>
    </div>
    <div class="col-md-3">
    <div class="card text-bg-light mb-3 " style="max-width: 18rem;">
          <div class="card-header">Pelanggan</div>
          <div class="card-body">
            <h5 class="card-title">Jumlah Pelanggan</h5>
            <p class="card-text">{{$customer + $konsumen}}</p>
          </div>
        </div>
    </div>
  </div>
  <div class="col-md-3">
      <div class="card text-bg-secondary mb-3" style="max-width: 18rem;">
          <div class="card-header">Transaksi</div>
          <div class="card-body">
            <h5 class="card-title">Jumlah Transaksi</h5>
            <p class="card-text">{{$transaksicustomer + $transaksiconsumer }}</p>
          </div>
        </div>
    </div>
      </div>
</div>
@endsection