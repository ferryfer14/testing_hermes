<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {
    	// mengambil data dari table pegawai
        $pass = '_sm1t_OK';
        $data  = Hash::make('_sm1t_OK');
        echo json_encode(array('status' => $data));
 
    }
}
