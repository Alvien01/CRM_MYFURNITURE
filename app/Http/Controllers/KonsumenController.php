<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use TheSeer\Tokenizer\Exception;
use App\StudInsert;

class KonsumenController extends Controller
{
    public function list()
    {
        $data = Konsumen::all();
        return view('Konsumen.list',compact('data'));
    }

    public function show($id)
    {
        $userData = Konsumen::find($id);
        return view('Konsumen.konsumen',compact('userData'));
    }
 
	public function create(){
		return view('Konsumen.insert');
	}

    public function edit($id)
    {
        $userData = Konsumen::find($id);
        return view('Konsumen.edit',compact('userData'));
    }
 
    //blogDelete
    public function delete($id)
    {
        $konsumen = Konsumen::find($id);
        if ($konsumen === null) {
			return redirect('/konsumen')->with('failed',"Delete failed");
        }
 
        $data = Konsumen::find($id);
        $data->delete();
        return redirect('/konsumen')->with('status',"Delete successfully");
    }
    public function store(Request $request){
        $data = $request->input();
        $rules = [
			'nama' => 'required|string|min:3|max:25',
			'hp' => 'required|string|min:11|max:15',
			'email' => 'required|string|email|max:30'
		];

		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect('/konsumen/create')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
				$konsumen = new Konsumen;
                $konsumen->nama_konsumen= $data['nama'];
                $konsumen->no_hp_konsumen = $data['hp'];
				$konsumen->email_konsumen = $data['email'];
				$konsumen->save();
				return redirect('/konsumen')->with('status',"Insert successfully");
			}
			catch(Exception $e){
				return redirect('/konsumen/create')->with('failed',"operation failed");
			}
		}
    }
 
    public function update(Request $request){
        $data = $request->input();
        $rules = [
			'nama' => 'required|string|min:3|max:25',
			'hp' => 'required|string|min:11|max:15',
			'email' => 'required|string|email|max:30'
		];

		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect('/konsumen/create')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
                $id = $request->input('id');
                $konsumen = Konsumen::find($id);
                $konsumen->nama_konsumen = $request->input('nama');
                $konsumen->no_hp_konsumen= $request->input('hp');
                $konsumen->email_konsumen = $request->input('email');
                $konsumen->update();
				return redirect('/konsumen')->with('status',"Update successfully");
			}
			catch(Exception $e){
				return redirect("/konsumen/edit/$id")->with('failed',"operation failed");
			}
		}
    }
}
