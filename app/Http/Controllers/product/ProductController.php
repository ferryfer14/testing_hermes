<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $data_product = ProductModel::all();
    	return view('product_list', ['product' => $data_product]);
    }
}
