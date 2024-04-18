<?php

namespace App\Http\Controllers;

use App\Models\Poin;
use App\Models\Konsumen;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use TheSeer\Tokenizer\Exception;
use App\StudInsert;
use SebastianBergmann\CodeCoverage\Driver\Selector;

class PoinController extends Controller
{
    // public function list()
    // {
    //      $data = Poin::leftJoin('tb_consumer.id_konsumen', 'tb_consumer.id_id_consumer', '=', 'tb_poin.id_poin')
    //                              ->get('tb_poin.*', 'tb_consumer.nama_konsumen');
    //     return view('transaksiconsumer.list',compact('data'));
    // }
	public function list()
    {
        $data = Poin::all();
        return view('Poin.list',compact('data'));
    }

    public function show($id)
    {
        $userData = Poin::find($id);
        return view('Poin.poin',compact('userData'));
    }
    public function create(){
		$konsumen = Konsumen::all();
        $data = Poin::all();
		return view('Poin.insert',compact('data', 'konsumen'));
	}
    public function edit($id)
    {
		$konsumen = Konsumen::all();
        $userData = Poin::find($id);
        return view('Poin.edit',compact('userData', 'konsumen'));
    }

 
    //blogDelete
    public function delete($id)
    {
        $poin = Poin::find($id);
        if ($poin === null) {
			return redirect('/poin')->with('failed',"Delete failed");
        }
 
        $data = Poin::find($id);
        $data->delete();
        return redirect('/poin')->with('status',"Delete successfully");
    }
    public function store(Request $request){
        $data = $request->input();
        $rules = [
			'id_konsumen' => 'required|int',
			'jumlah_poin' => 'required|int'
		];

		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect('/poin/create')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
				$poin = new Poin;
                $poin->id_konsumen = $data['id_konsumen'];
                $poin->jumlah_poin = $data['jumlah_poin'];
				$poin->save();
				return redirect('/poin')->with('status',"Insert successfully");
			}
			catch(Exception $e){
				return redirect('/poin/create')->with('failed',"operation failed");
			}
		}
    }
 
    public function update(Request $request){
        $data = $request->input();
        $rules = [
			'id_konsumen' => 'required|int',
			'jumlah_poin' => 'required|int'
		];

		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect('/poin/create')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
                $id = $request->input('id');
                Poin::where('id_poin', $id)->update([
                    'id_konsumen' => $data['id_konsumen'],
                    'jumlah_poin' => $data['jumlah_poin']
                ]);
				return redirect('/poin')->with('status',"Update successfully");
			}
			catch(Exception $e){
				return redirect("/poin/edit/$id")->with('failed',"operation failed");
			}
		}
    }
}
