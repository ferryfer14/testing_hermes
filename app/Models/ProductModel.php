<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
     protected $table = 'product';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'product_code', 'product_name','price','currency','discount','dimension','unit'
    ];
}
