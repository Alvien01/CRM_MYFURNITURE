<?php

namespace App\Http\Controllers;
use App\Models\Distributor;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use TheSeer\Tokenizer\Exception;
use App\StudInsert;

class DistributorController extends Controller
{
    public function list()
    {
        $data = Distributor::all();
        return view('Distributor.list',compact('data'));
    }

    public function show($id)
    {
        $userData = Distributor::find($id);
        return view('Distributor.distributor',compact('userData'));
    }
 
	public function create(){
		return view('Distributor.insert');
	}

    public function edit($id)
    {
        $userData = Distributor::find($id);
        return view('Distributor.edit',compact('userData'));
    }
 
    //blogDelete
    public function delete($id)
    {
        $distributor = Distributor::find($id);
        if ($distributor === null) {
			return redirect('/distributor')->with('failed',"Delete failed");
        }
 
        $data = Distributor::find($id);

        try {
            $data->delete();
            return redirect('/distributor')->with('status',"Delete successfully");
        } catch (\Exception $err) {
            return redirect('/distributor')->with('failed',"Delete data failed");

        }
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
			return redirect('/distributor/create')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
				$distributor = new Distributor;
                $distributor->nama_distributor = $data['nama'];
                $distributor->no_hp_distributor = $data['hp'];
				$distributor->email_distributor = $data['email'];
				$distributor->save();
				return redirect('/distributor')->with('status',"Insert successfully");
			}
			catch(Exception $e){
				return redirect('/distributor/create')->with('failed',"operation failed");
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
			return redirect('/distributor/create')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
                $id = $request->input('id');
                $distributor = Distributor::find($id);
                $distributor->nama_distributor = $request->input('nama');
                $distributor->no_hp_distributor = $request->input('hp');
                $distributor->email_distributor = $request->input('email');
                $distributor->update();
				return redirect('/distributor')->with('status',"Update successfully");
			}
			catch(Exception $e){
				return redirect("/distributor/edit/$id")->with('failed',"operation failed");
			}
		}
    }
 
}
