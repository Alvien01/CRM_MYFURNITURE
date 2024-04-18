<?php

namespace App\Http\Controllers;

use App\Models\TransaksiConsumer;
use App\Models\Konsumen;
use App\Models\Pegawai;
use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Database\DatabaseManager;
use TheSeer\Tokenizer\Exception;
use App\StudInsert;
use SebastianBergmann\CodeCoverage\Driver\Selector;

class TransaksiConsumerController extends Controller
{
    
    public function list()
    {
         $data = TransaksiConsumer::Join('tb_barang', 'tb_barang.id_barang', '=', 'tb_transaksi_konsumen.id_barang')
                                 ->leftJoin('tb_pegawai', 'tb_pegawai.id_pegawai', '=', 'tb_transaksi_konsumen.id_pegawai')
                                 ->leftJoin('tb_consumer', 'tb_consumer.id_konsumen', '=', 'tb_transaksi_konsumen.id_konsumen')
                                 ->get('tb_transaksi_konsumen.*', 'tb_barang.nama_barang', 'tb_pegawai.nama_pegawai', 'tb_consumer.nama_konsumen');
        return view('transaksiconsumer.list',compact('data'));
    }
//list view
    public function show($id)
    {
        $userData = TransaksiConsumer::leftJoin('tb_barang', 'tb_barang.id_barang', '=', 'tb_transaksi_konsumen.id_barang')
        ->leftJoin('tb_pegawai', 'tb_pegawai.id_pegawai', '=', 'tb_transaksi_konsumen.id_pegawai')
        ->leftJoin('tb_consumer', 'tb_consumer.id_konsumen', '=', 'tb_transaksi_konsumen.id_konsumen')
        ->leftJoin('tb_transaksi', 'tb_transaksi.id_transaksi', '=' , 'tb_transaksi_konsumen.id_transaksi')
        ->where('tb_transaksi_konsumen.id_transaksi_konsumen', $id)
        ->select('tb_barang.nama_barang', 'tb_pegawai.nama_pegawai', 'tb_consumer.nama_konsumen','tb_transaksi.jenis_transaksi', 'tb_transaksi_konsumen.*')
        ->get()
        ->first();
        return view('TransaksiConsumer.transaksiconsumer',compact('userData'));
    }
    public function cetakTransaksiConsumer()
    {
    	$datatransaksiconsumer = TransaksiConsumer::all();
        return view('TransaksiConsumer.cetak-transaksiconsumer', compact('datatransaksiconsumer'));
    }
    public function create(){
		$datatransaksiconsumer = TransaksiConsumer::all();
        $datakonsumen = Konsumen::all();
        $datapegawai = Pegawai::all();
        $databarang = Barang::all();
        $datatransaksi = Transaksi::all();
		return view('TransaksiConsumer.insert',compact('datatransaksiconsumer','datakonsumen','datapegawai','databarang','datatransaksi'));
	}
    public function edit($id)
    {
        $userData = TransaksiConsumer::find($id);
        $datakonsumen = Konsumen::all();
        $datapegawai = Pegawai::all();
        $databarang = Barang::all();
        $datatransaksi = Transaksi::all();
        return view('transaksiconsumer.edit',compact('userData', 'datakonsumen','datapegawai', 'databarang', 'datatransaksi'));
    }

 
    //blogDelete
    public function delete($id)
    {
        $datatransaksiconsumer = TransaksiConsumer::find($id);
        if ($datatransaksiconsumer === null) {
			return redirect('/transaksiconsumer')->with('failed',"Delete failed");
        }
 
        $data = TransaksiConsumer::find($id);
        $data->delete();
        return redirect('/transaksiconsumer')->with('status',"Delete successfully");
    }
    public function store(Request $request){
        $data = $request->input();
        $rules = [
			'id_konsumen' => 'required|int',
			'id_pegawai' => 'required|int',
			'id_barang' => 'required|int',
			'id_transaksi' => 'required|int',
			'jumlah_barang' => 'required|int',
            'tanggal_transaksi' => 'required|string',
		];

		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect('/transaksiconsumer/create')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
                $barang = Barang::find($data['id_barang']);

				$transaksiconsumer = new TransaksiConsumer;
                $transaksiconsumer->id_konsumen = $data['id_konsumen'];
                $transaksiconsumer->id_pegawai = $data['id_pegawai'];
                $transaksiconsumer->id_barang = $data['id_barang'];
				$transaksiconsumer->id_transaksi = $data['id_transaksi'];
                $transaksiconsumer->jumlah_barang = $data['jumlah_barang'];
                $transaksiconsumer->tanggal_transaksi = $data['tanggal_transaksi'];
                $transaksiconsumer->total_harga = $data['jumlah_barang'] * $barang['harga_barang'];
				$transaksiconsumer->save();
				return redirect('/transaksiconsumer')->with('status',"Insert successfully");
			}
			catch(Exception $e){
				return redirect('/transaksiconsumer/create')->with('failed',"operation failed");
			}
		}
    }
 
    public function update(Request $request){
        $data = $request->input();
        $rules = [
			'id_konsumen' => 'required|int',
			'id_pegawai' => 'required|int',
			'id_barang' => 'required|int',
            'id_transaksi' => 'required|int',
            'jumlah_barang' => 'required|int',
            'tanggal_transaksi' => 'required|date'
		];

		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect('/transaksiconsumer/edit/'.$request->input('id'))
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
                $barang = Barang::find($data['id_barang']);
                $id = $request->input('id');
                $transaksiconsumer = TransaksiConsumer::find($id);
                $transaksiconsumer->id_konsumen = $data['id_konsumen'];
                $transaksiconsumer->id_pegawai = $data['id_pegawai'];
				$transaksiconsumer->id_barang = $data['id_barang'];
                $transaksiconsumer->id_transaksi = $data['id_transaksi'];
                $transaksiconsumer->jumlah_barang = $data['jumlah_barang'];
                $transaksiconsumer->tanggal_transaksi = $data['tanggal_transaksi'];
                $transaksiconsumer->total_harga = $data['jumlah_barang'] * $barang['harga_barang'];

                $transaksiconsumer->update();
				return redirect('/transaksiconsumer')->with('status',"Update successfully");
			}
			catch(Exception $e){
				return redirect("/transaksiconsumer/edit/$id")->with('failed',"operation failed");
			}
		}
    }
}
