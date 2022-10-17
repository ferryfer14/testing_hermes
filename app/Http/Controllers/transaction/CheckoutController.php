<?php

namespace App\Http\Controllers\transaction;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\TransactionDetailModel;
use App\Models\TransactionHeaderModel;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        $data_product = ProductModel::all();
        return view('checkout', ['product' => $data_product]);
    }
    private function readLastId()
    {
        $transaction_header = TransactionHeaderModel::latest();
        $last_id = 0;
        if ($transaction_header->count() > 0) {
            $last_id = $transaction_header->first()['id'];
        }
        return $last_id;
    }
    public function submit(Request $request)
    {
        $total = $request->input('total');
        $data_product = ProductModel::all();
        $new_id = str_pad($this->readLastId() + 1, 3, '0', STR_PAD_LEFT);
        $transaction_header = TransactionHeaderModel::create([
            'document_code' => 'TRX',
            'document_number' => $new_id,
            'user' => 'Smit',
            'total' => $total,
            'date' => date("Y-m-d"),
        ]);
        $transaction_header->save();
        foreach ($data_product as $p) {
            $transaction_detail = TransactionDetailModel::create([
                'document_code' => 'TRX',
                'document_number' => $new_id,
                'product_code' => $p->product_code,
                'price' => $p->price,
                'quantity' => '2',
                'unit' => $p->unit,
                'subtotal' => $p->price * 2,
                'currency' => $p->currency,
            ]);
            $transaction_detail->save();
        }
        if ($new_id != null) {
            return response()->json([
                'status' => 'success',
                'message' => 'message'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'failed create transaction'
            ]);
        }

        //
    }
}
