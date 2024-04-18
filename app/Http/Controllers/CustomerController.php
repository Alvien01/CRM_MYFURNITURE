<?php
 
namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use TheSeer\Tokenizer\Exception;
use App\StudInsert;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Symfony\Contracts\Service\Attribute\Required;

class CustomerController extends Controller
{
    public function list()
    {
        $data = Customer::all();
        return view('Customer.list',compact('data'));
    }

    public function show($id)
    {
        $userData = Customer::find($id);
        return view('Customer.customer',compact('userData'));
    }
    public function cetakCustomer()
    {
    	$customer = Customer::all();
        return view('Customer.cetak-customer', compact('customer'));
    }
	public function create(){
		return view('Customer.insert');
	}

    public function edit($id)
    {
        $userData = Customer::find($id);
        return view('Customer.edit',compact('userData'));
    }
 
    //blogDelete
    public function delete($id)
    {
        $customer = Customer::find($id);
        if ($customer === null) {
			return redirect('/customer')->with('failed',"Delete failed");
        }
 
        $data = Customer::find($id);
        $data->delete();
        return redirect('/customer')->with('status',"Delete successfully");
    }
    public function store(Request $request){
        $data = $request->input();
        $rules = [
			'nama' => 'required|string|min:3|max:25',
			'hp' => 'required|string|min:11|max:15',
            'email' => 'required|string|min:5|max:25'
		];

		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect('/customer/create')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
				$customer = new Customer;
                $customer->nama_customer = $data['nama'];
                $customer->no_hp_customer = $data['hp'];
                $customer->email_customer = $data['email'];
				$customer->save();
				return redirect('/customer')->with('status',"Insert successfully");
			}
			catch(Exception $e){
				return redirect('/customer/create')->with('failed',"operation failed");
			}
		}
    }
 
    public function update(Request $request){
        $data = $request->input();
        $rules = [
			'nama' => 'required|string|min:3|max:25',
			'hp' => 'required|string|min:11|max:15',
            'email' => 'required|string|min:5| max:25'
		];
 
		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect('/customer/create')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
                $id = $request->input('id');
                $customer = Customer::find($id);
                $customer->nama_customer = $request->input('nama');
                $customer->no_hp_customer = $request->input('hp');
                $customer->update();
				return redirect('/customer')->with('status',"Update successfully");
			}
			catch(Exception $e){
				return redirect("/customer/edit/$id")->with('failed',"operation failed");
			}
		}
    }
 
}