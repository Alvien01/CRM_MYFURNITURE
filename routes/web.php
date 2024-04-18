<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\KonsumenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PoinController;
use App\Http\Controllers\TransaksiConsumerController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TransaksiCustomerController;

use App\Models\Pegawai;
use App\Models\Customer;
use App\Models\Disributor;
use App\Models\Konsumen;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\TransaksiConsumer;
use Illuminate\Auth\Events\Login;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('landingpage', function () {
    return view('landingpage');
});

Route::get('/master', [HomeController::class, 'index']);

Route::get('landingpage', function(){
    return view('landingpage');
});

// route blog pegawai
Route::get('/pegawai/index', [PegawaiController::class, 'index']);
Route::get('/pegawai',  [PegawaiController::class, 'list']); 
Route::get('/pegawai/create',  [PegawaiController::class, 'create']);
Route::post('/pegawai/store',  [PegawaiController::class, 'store']);
Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit']); 
Route::post('/pegawai/update' , [PegawaiController::class, 'update']);
Route::get('/pegawai/delete/{id}', [PegawaiController::class,'delete']);
Route::get('/pegawai/{id}', [PegawaiController::class, 'show']);
Route::get('/cetak-pegawai', [PegawaiController::class,'cetakpegawai']);


//Route customer
Route::get('/customer', [CustomerController::class, 'list']);
Route::get('/customer/create', [CustomerController::class, 'create']);
Route::post('/customer/store',[CustomerController::class,'store']);
Route::get('/customer/edit/{id}', [CustomerController::class,'edit']);
Route::post('/customer/update',[CustomerController::class, 'update']);
Route::get('customer/delete/{id}', [CustomerController::class, 'delete']);
Route::get('/customer/{id}', [CustomerController::class, 'show']);
Route::get('/cetak-customer', [CustomerController::class,'cetakcustomer']);


//Route Disributor
Route::get('/distributor/index', [DistributorController::class, 'index']);
Route::get('/distributor',  [DistributorController::class, 'list']); 
Route::get('/distributor/create',  [DistributorController::class, 'create']);
Route::post('/distributor/store',  [DistributorController::class, 'store']);
Route::get('/distributor/edit/{id}', [DistributorController::class, 'edit']); 
Route::post('/distributor/update' , [DistributorController::class, 'update']);
Route::get('/distributor/delete/{id}', [DistributorController::class,'delete']);
Route::get('/distributor/{id}', [DistributorController::class, 'show']);

//Route Consumer/Konsumen
Route::get('/konsumen/index',[KonsumenController::class, 'index']);
Route::get('/konsumen', [KonsumenController::class, 'list']);
Route::get('/konsumen/create', [KonsumenController::class, 'create']);
Route::post('/konsumen/store', [KonsumenController::class, 'store']);
Route::get('/konsumen/edit/{id}', [KonsumenController::class, 'edit']);
Route::post('/konsumen/update', [KonsumenController::class, 'update']);
Route::get('/konsumen/delete/{id}', [KonsumenController::class, 'delete']);
Route::get('/konsumen/{id}', [KonsumenController::class, 'show']);


//route barang
Route::get('/barang/index', [BarangController::class,'index']);
Route::get('/barang', [BarangController::class,'list']);
Route::get('/barang/create', [BarangController::class, 'create']);
Route::post('/barang/create', [BarangController::class, 'create']);
Route::post('/barang/store', [BarangController::class, 'store']);
Route::get('/barang/edit/{id}', [BarangController::class, 'edit']);
Route::post('/barang/update', [BarangController::class, 'update']);
Route::get('/barang/delete/{id}', [BarangController::class, 'delete']);
Route::get('/barang/{id}', [BarangController::class, 'show']);
Route::get('/cetak-barang', [BarangController::class,'cetakbarang']);

//Route Transaksi
Route::get('/transaksi/index', [TransaksiController::class,'index']);
Route::get('/transaksi', [TransaksiController::class,'list']);
Route::get('/transaksi/create', [TransaksiController::class, 'create']);
Route::post('/transaksi/create', [TransaksiController::class, 'create']);
Route::post('/transaksi/store', [TransaksiController::class, 'store']);
Route::get('/transaksi/edit/{id}', [TransaksiController::class, 'edit']);
Route::post('/transaksi/update', [TransaksiController::class, 'update']);
Route::get('/transaksi/delete/{id}', [TransaksiController::class, 'delete']);
Route::get('/transaksi/{id}', [TransaksiController::class, 'show']);

//Route Poin
Route::get('/poin/index', [PoinController::class,'index']);
Route::get('/poin', [PoinController::class,'list']);
Route::get('/poin/create', [PoinController::class, 'create']);
Route::post('/poin/create', [PoinController::class, 'create']);
Route::post('/poin/store', [PoinController::class, 'store']);
Route::get('/poin/edit/{id}', [PoinController::class, 'edit']);
Route::post('/poin/update', [PoinController::class, 'update']);
Route::get('/poin/delete/{id}', [PoinController::class, 'delete']);
Route::get('/poin/{id}', [PoinController::class, 'show']);

//Route Penukaran Poin
Route::get('/penukaranpoin/index', [PoinController::class,'index']);
Route::get('/penukaranpoin', [PoinController::class,'list']);
Route::get('/penukaranpoin/create', [PoinController::class, 'create']);
Route::post('/penukaranpoin/create', [PoinController::class, 'create']);
Route::post('/penukaranpoin/store', [PoinController::class, 'store']);
Route::get('/penukaranpoin/edit/{id}', [PoinController::class, 'edit']);
Route::post('/penukaranpoin/update', [PoinController::class, 'update']);
Route::get('/penukaranpoin/delete/{id}', [PoinController::class, 'delete']);
Route::get('/penukaranpoin/{id}', [PoinController::class, 'show']);

//Route TransaksiConsumer
Route::get('/transaksiconsumer/index', [TransaksiConsumerController::class,'index']);
Route::get('/transaksiconsumer', [TransaksiConsumerController::class,'list']);
Route::get('/transaksiconsumer/create', [TransaksiConsumerController::class, 'create']);
Route::post('/transaksiconsumer/store', [TransaksiConsumerController::class, 'store']);
Route::get('/transaksiconsumer/edit/{id}', [TransaksiConsumerController::class, 'edit']);
Route::post('/transaksiconsumer/update', [TransaksiConsumerController::class, 'update']);
Route::get('/transaksiconsumer/delete/{id}', [TransaksiConsumerController::class, 'delete']);
Route::get('/transaksiconsumer/{id}', [TransaksiConsumerController::class, 'show']);
Route::get('/cetak-transaksiconsumer', [PegawaiController::class,'cetaktransaksiconsumer']);


//Route TransaksiConsumer
Route::get('/transaksicustomer/index', [TransaksiCustomerController::class,'index']);
Route::get('/transaksicustomer', [TransaksiCustomerController::class,'list']);
Route::get('/transaksicustomer/create', [TransaksiCustomerController::class, 'create']);
Route::post('/transaksicustomer/store', [TransaksiCustomerController::class, 'store']);
Route::get('/transaksicustomer/edit/{id}', [TransaksiCustomerController::class, 'edit']);
Route::post('/transaksicustomer/update', [TransaksiCustomerController::class, 'update']);
Route::get('/transaksicustomer/delete/{id}', [TransaksiCustomerController::class, 'delete']);
Route::get('/transaksicustomer/{id}', [TransaksiCustomerController::class, 'show']);

//Route DataRiwayat
Route::get('/datariwayat/index', [TransaksiCustomerController::class,'index']);
Route::get('/datariwayat', [TransaksiCustomerController::class,'list']);
Route::get('/datariwayat/create', [TransaksiCustomerController::class, 'create']);
Route::post('/datariwayat/store', [TransaksiCustomerController::class, 'store']);
Route::get('/datariwayat/edit/{id}', [TransaksiCustomerController::class, 'edit']);
Route::post('/datariwayat/update', [TransaksiCustomerController::class, 'update']);
Route::get('/datariwayat/delete/{id}', [TransaksiCustomerController::class, 'delete']);
Route::get('/datariwayat/{id}', [TransaksiCustomerController::class, 'show']);

//route login
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login-submit', [AuthController::class, 'loginSubmit']);
Route::get('/log-out', [AuthController::class, 'logOut']);


//report 
