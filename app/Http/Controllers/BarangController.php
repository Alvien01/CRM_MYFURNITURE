<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Distributor;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use TheSeer\Tokenizer\Exception;
use App\StudInsert;
use SebastianBergmann\CodeCoverage\Driver\Selector;

class BarangController extends Controller
{
	public function list(Request $request)
    {
        if(empty($request->session()->get('login'))){
            return redirect("/login")->with('failed',"Please Login");
        }
        $data = Barang::all();
        return view('Barang.list',compact('data'));
    }
    public function cetakBarang(Request $request)
    {
        if(empty($request->session()->get('login'))){
            return redirect("/login")->with('failed',"Please Login");
        }
    	$barang = Barang::all();
        return view('Barang.cetak-barang', compact('barang'));
    }
    public function show($id, Request $request)
    {
        if(empty($request->session()->get('login'))){
            return redirect("/login")->with('failed',"Please Login");
        }
        $userData = Barang::find($id);
        return view('Barang.barang',compact('userData'));
    }
    public function create(Request $request){
        if(empty($request->session()->get('login'))){
            return redirect("/login")->with('failed',"Please Login");
        }
		$data = Distributor::all();
		return view('Barang.insert',compact('data'));
	}
    public function edit($id, Request $request)
    {
        if(empty($request->session()->get('login'))){
            return redirect("/login")->with('failed',"Please Login");
        }
		$distributor = Distributor::all();
        $userData = Barang::find($id);
        return view('Barang.edit',compact('userData', 'distributor'));
    }


    //blogDelete
    public function delete($id, Request $request)
    {
        if(empty($request->session()->get('login'))){
            return redirect("/login")->with('failed',"Please Login");
        }
        $barang = Barang::find($id);
        if ($barang === null) {
			return redirect('/barang')->with('failed',"Delete failed");
        }
 
        $data = Barang::find($id);
        $data->delete();
        return redirect('/barang')->with('status',"Delete successfully");
    }
    public function store(Request $request){
        if(empty($request->session()->get('login'))){
            return redirect("/login")->with('failed',"Please Login");
        }
        $data = $request->input();
        $rules = [
			'nama_barang' => 'required|string|min:3|max:25',
			'jenis_barang' => 'required|string|min:5|max:20',
			'harga_barang' => 'required|int',
            'stock' => 'required|int',
            'id_distributor' => 'required|int'
		];

		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect('/barang/create')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
				$barang = new Barang;
                $barang->nama_barang = $data['nama_barang'];
                $barang->jenis_barang = $data['jenis_barang'];
				$barang->harga_barang = $data['harga_barang'];
                $barang->stock = $data['stock'];
                $barang->id_distributor = $data['id_distributor'];
				$barang->save();
				return redirect('/barang')->with('status',"Insert successfully");
			}
			catch(Exception $e){
				return redirect('/barang/create')->with('failed',"operation failed");
			}
		}
    }
 
    public function update(Request $request){
        if(empty($request->session()->get('login'))){
            return redirect("/login")->with('failed',"Please Login");
        }
        $data = $request->input();
        $rules = [
			'nama_barang' => 'required|string|min:3|max:25',
			'jenis_barang' => 'required|string|min:5|max:20',
			'harga_barang' => 'required|int',
            'stock' => 'required|int',
            'id_distributor' => 'required|int'
		];

		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect('/barang/create')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
                $id = $request->input('id');
                $barang = Barang::find($id);
                $barang->nama_barang = $data['nama_barang'];
                $barang->jenis_barang = $data['jenis_barang'];
				$barang->harga_barang = $data['harga_barang'];
                $barang->stock = $data['stock'];
                $barang->id_distributor = $data['id_distributor'];
                $barang->update();
				return redirect('/barang')->with('status',"Update successfully");
			}
			catch(Exception $e){
				return redirect("/barang/edit/$id")->with('failed',"operation failed");
			}
		}
    }
}
