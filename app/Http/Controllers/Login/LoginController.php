<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use App\Models\LoginModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function index()
    {
    	return view('login');
    }
    public function submit(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $data_login = LoginModel::where('user',$username);
        if($data_login->count() > 0){
            $data = $data_login->first();
            $old_password = $data['password'];
            if(Hash::check($password, $old_password)){
                return response()->json([
                    'status' => 'success',
                    'message' => 'message'
                ]);
            }else{ 
                return response()->json([
                    'status' => 'error',
                    'message' => 'Password is not match'
                ]);
            }
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Username is not found'
            ]);
        }
        //
    }
}
