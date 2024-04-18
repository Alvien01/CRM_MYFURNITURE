<?php
 
namespace App\Http\Controllers;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use TheSeer\Tokenizer\Exception;
use App\StudInsert;
use PDF;
class PegawaiController extends Controller
{
    public function list()
    {
        $data = Pegawai::all();
        return view('Pegawai.list',compact('data'));
    }

    public function show($id)
    {
        $userData = Pegawai::find($id);
        return view('Pegawai.pegawai',compact('userData'));
    }
    public function cetakPegawai()
    {
    	$pegawai = Pegawai::all();
        return view('Pegawai.cetak-pegawai', compact('pegawai'));
    }
	public function create(){
		return view('Pegawai.insert');
	}

    public function edit($id)
    {
        $userData = Pegawai::find($id);
        return view('Pegawai.edit',compact('userData'));
    }
 
    //blogDelete
    public function delete($id)
    {
        $pegawai = Pegawai::find($id);
        if ($pegawai === null) {
			return redirect('/pegawai')->with('failed',"Delete failed");
        }
 
        $data = Pegawai::find($id);
        $data->delete();
        return redirect('/pegawai')->with('status',"Delete successfully");
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
			return redirect('/pegawai/create')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
				$pegawai = new Pegawai;
                $pegawai->nama_pegawai = $data['nama'];
                $pegawai->no_hp_pegawai = $data['hp'];
				$pegawai->email_pegawai = $data['email'];
				$pegawai->save();
				return redirect('/pegawai')->with('status',"Insert successfully");
			}
			catch(Exception $e){
				return redirect('/pegawai/create')->with('failed',"operation failed");
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
			return redirect('/blog/create')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
                $id = $request->input('id');
                $pegawai = Pegawai::find($id);
                $pegawai->nama_pegawai = $request->input('nama');
                $pegawai->no_hp_pegawai = $request->input('hp');
                $pegawai->email_pegawai = $request->input('email');
                $pegawai->update();
				return redirect('/pegawai')->with('status',"Update successfully");
			}
			catch(Exception $e){
				return redirect("/pegawai/edit/$id")->with('failed',"operation failed");
			}
		}
    }
 
}