<?php

namespace App\Http\Controllers;

use App\Models\UserLogin;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use TheSeer\Tokenizer\Exception;
use App\StudInsert;
use SebastianBergmann\CodeCoverage\Driver\Selector;

class AuthController extends Controller
{
    
    public function login()
    {
        return view('Auth.login');
    }
    public function loginSubmit(Request $request){
        $data = $request->input();
        $rules = [
			'email' => 'required|string|min:3|max:25',
			'password' => 'required|string|min:5|max:20'
		];
		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect('/login')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
                $user = UserLogin::where('email', $data['email'])
                        ->where('password', $data['password'])
                        ->first();
                if(!empty($user)){
                    $request->session()->put('login', true);
                    return redirect('/master')->with('status',"Login Successfully");
                } else {
				    return redirect("/login")->with('failed',"Check Password/Email");
                }
			}
			catch(Exception $e){
				return redirect("/login")->with('failed',"Check Password/Email");
			}
		}
    }
    public function logOut(Request $request)
    {
        $request->session()->flush();
		return redirect("/login");
    }
}
