<?php

namespace App\Http\Controllers;

use App\Models\TransaksiCustomer;
use App\Models\Customer;
use App\Models\Pegawai;
use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Database\DatabaseManager;
use TheSeer\Tokenizer\Exception;
use App\StudInsert;
use SebastianBergmann\CodeCoverage\Driver\Selector;

class TransaksiCustomerController extends Controller
{
    public function list()
    {
         $data = TransaksiCustomer::leftJoin('tb_barang', 'tb_barang.id_barang', '=', 'tb_transaksi_customer.id_barang')
                                 ->leftJoin('tb_pegawai', 'tb_pegawai.id_pegawai', '=', 'tb_transaksi_customer.id_pegawai')
                                 ->leftJoin('tb_customer', 'tb_customer.id_customer', '=', 'tb_transaksi_customer.id_customer')
                                 ->get('tb_transaksi_customer.*', 'tb_barang.nama_barang', 'tb_pegawai.nama_pegawai', 'tb_customer.nama_customer');
        return view('transaksicustomer.list',compact('data'));
    }
//list view
    public function show($id)
    {
        $userData = TransaksiCustomer::leftJoin('tb_barang', 'tb_barang.id_barang', '=', 'tb_transaksi_customer.id_barang')
        ->leftJoin('tb_pegawai', 'tb_pegawai.id_pegawai', '=', 'tb_transaksi_customer.id_pegawai')
        ->leftJoin('tb_customer', 'tb_customer.id_customer', '=', 'tb_transaksi_customer.id_customer')
        ->leftJoin('tb_transaksi', 'tb_transaksi.id_transaksi', '=' , 'tb_transaksi_customer.id_transaksi')
        ->where('tb_transaksi_customer.id_transaksi_customer', $id)
        ->select('tb_barang.nama_barang', 'tb_pegawai.nama_pegawai', 'tb_customer.nama_customer','tb_transaksi.jenis_transaksi', 'tb_transaksi_customer.*')
        ->get()
        ->first();
        return view('TransaksiCustomer.transaksicustomer',compact('userData'));
    }
    public function create(){
		$datatransaksicustomer = TransaksiCustomer::all();
        $datacustomer = Customer::all();
        $datapegawai = Pegawai::all();
        $databarang = Barang::all();
        $datatransaksi = Transaksi::all();
		return view('TransaksiCustomer.insert',compact('datatransaksicustomer','datacustomer','datapegawai','databarang','datatransaksi'));
	}
    public function edit($id)
    {
        $userData = TransaksiCustomer::find($id);
        $datacustomer = Customer::all();
        $datapegawai = Pegawai::all();
        $databarang = Barang::all();
        $datatransaksi = Transaksi::all();
        return view('transaksicustomer.edit',compact('userData', 'datacustomer','datapegawai', 'databarang', 'datatransaksi'));
    }

 
    //blogDelete
    public function delete($id)
    {
        $datatransaksicustomer = TransaksiCustomer::find($id);
        if ($datatransaksicustomer === null) {
			return redirect('/transaksicustomer')->with('failed',"Delete failed");
        }
 
        $data = TransaksiCustomer::find($id);
        $data->delete();
        return redirect('/transaksicustomer')->with('status',"Delete successfully");
    }
    public function store(Request $request){
        $data = $request->input();
        $rules = [
			'id_customer' => 'required|int',
			'id_pegawai' => 'required|int',
			'id_barang' => 'required|int',
			'id_transaksi' => 'required|int',
			'jumlah_barang' => 'required|int',
            'tanggal_transaksi' => 'required|string',
		];

		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect('/transaksicustomer/create')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
                $barang = Barang::find($data['id_barang']);

				$transaksicustomer = new TransaksiCustomer;
                $transaksicustomer->id_customer = $data['id_customer'];
                $transaksicustomer->id_pegawai = $data['id_pegawai'];
                $transaksicustomer->id_barang = $data['id_barang'];
				$transaksicustomer->id_transaksi = $data['id_transaksi'];
                $transaksicustomer->jumlah_barang = $data['jumlah_barang'];
                $transaksicustomer->tanggal_transaksi = $data['tanggal_transaksi'];
                $transaksicustomer->total_harga = $data['jumlah_barang'] * $barang['harga_barang'];
				$transaksicustomer->save();
				return redirect('/transaksicustomer')->with('status',"Insert successfully");
			}
			catch(Exception $e){
				return redirect('/transaksicustomer/create')->with('failed',"operation failed");
			}
		}
    }
 
    public function update(Request $request){
        $data = $request->input();
        $rules = [
			'id_customer' => 'required|int',
			'id_pegawai' => 'required|int',
			'id_barang' => 'required|int',
            'id_transaksi' => 'required|int',
            'jumlah_barang' => 'required|int',
            'tanggal_transaksi' => 'required|date'
		];

		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect('/transaksicustomer/edit/'.$request->input('id'))
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
                $barang = Barang::find($data['id_barang']);
                $id = $request->input('id');
                $transaksicustomer = TransaksiCustomer::find($id);
                $transaksicustomer->id_customer = $data['id_customer'];
                $transaksicustomer->id_pegawai = $data['id_pegawai'];
				$transaksicustomer->id_barang = $data['id_barang'];
                $transaksicustomer->id_transaksi = $data['id_transaksi'];
                $transaksicustomer->jumlah_barang = $data['jumlah_barang'];
                $transaksicustomer->tanggal_transaksi = $data['tanggal_transaksi'];
                $transaksicustomer->total_harga = $data['jumlah_barang'] * $barang['harga_barang'];
                $transaksicustomer->update();
				return redirect('/transaksicustomer')->with('status',"Update successfully");
			}
			catch(Exception $e){
				return redirect("/transaksicustomer/edit/$id")->with('failed',"operation failed");
			}
		}
    }
}
