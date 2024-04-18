<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pegawai;
use App\Models\TransaksiConsumer;
use App\Models\TransaksiCustomer;
use App\Models\Customer;
use App\Models\Konsumen;

class HomeController extends Controller
{

    public function index(Request $request){
        if(empty($request->session()->get('login'))){
            return redirect("/login")->with('failed',"Please Login");
        }

        
        $barang = Barang::count();
        $pegawai = Pegawai::count();
        $transaksicustomer = TransaksiCustomer::count();
        $transaksiconsumer = TransaksiConsumer::count();
        $customer = Customer::count();
        $konsumen = Konsumen::count();        
        return view('dashboard', compact('barang', 'pegawai', 'transaksicustomer', 'transaksiconsumer', 'customer', 'konsumen'));
    }
}
