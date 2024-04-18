<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use TheSeer\Tokenizer\Exception;
use App\StudInsert;

class TransaksiController extends Controller
{
    public function list()
    {
        $data = Transaksi::all();
        return view('Transaksi.list',compact('data'));
    }

    public function show($id)
    {
        $userData = Transaksi::find($id);
        return view('Transaksi.transaksi',compact('userData'));
    }
 
	public function create(){
		return view('Transaksi.insert');
	}

    public function edit($id)
    {
        $userData = Transaksi::find($id);
        return view('Transaksi.edit',compact('userData'));
    }
 
    //blogDelete
    public function delete($id)
    {
        $transaksi = Transaksi::find($id);
        if ($transaksi === null) {
			return redirect('/transaksi')->with('failed',"Delete failed");
        }
 
        $data = Transaksi::find($id);
        $data->delete();
        return redirect('/transaksi')->with('status',"Delete successfully");
    }
    public function store(Request $request){
        $data = $request->input();
        $rules = [
			'nama_transaksi' => 'required|string|min:3|max:25',
            'jenis_transaksi' => 'required|string|min:3|max:25'
		];

		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect('/transaksi/create')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
				$transaksi = new Transaksi;
                $transaksi->nama_transaksi = $data['nama_transaksi'];
                $transaksi->jenis_transaksi = $data['jenis_transaksi'];
				$transaksi->save();
				return redirect('/transaksi')->with('status',"Insert successfully");
			}
			catch(Exception $e){
				return redirect('/transaksi/create')->with('failed',"operation failed");
			}
		}
    }
 
    public function update(Request $request){
        $data = $request->input();
        $rules = [
			'nama_transaksi' => 'required|string|min:3|max:25',
            'jenis_transaksi' => 'required|string|min:3|max:25'
		];

		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect('/transaksi/create')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
                $id = $request->input('id');
                $transaksi = Transaksi::find($id);
                $transaksi->nama_transaksi = $request->input('nama_transaksi');
                $transaksi->jenis_transaksi = $request->input('jenis_transaksi');
                $transaksi->update();
				return redirect('/transaksi')->with('status',"Update successfully");
			}
			catch(Exception $e){
				return redirect("/transaksi/edit/$id")->with('failed',"operation failed");
			}
		}
    }
 
}
