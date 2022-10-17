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
    public function detail(Request $request){
        $id = $request->input('id');
        $data_login = ProductModel::where('id',$id);
        if($data_login->count() > 0){
            $data = $data_login->first();
            return response()->json([
                'status' => 'success',
                'message' => 'message',
                'detail' => $data
            ]);
        }else{ 
            return response()->json([
                'status' => 'error',
                'message' => 'Product is not found'
            ]);
        }
    }
}
