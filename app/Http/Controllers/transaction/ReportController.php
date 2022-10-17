<?php

namespace App\Http\Controllers\transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    //
    public function index()
    {
        $data_transaction = DB::table('transaction_header as th')->join('transaction_detail as td','th.document_number','=','td.document_number')->join('product as p','p.product_code','=','td.product_code')->select("*")->get();
        return view('report', ['transaction' => $data_transaction]);
    }
}
