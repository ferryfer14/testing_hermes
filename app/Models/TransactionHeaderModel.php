<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeaderModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
     protected $table = 'transaction_header';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'document_code', 'document_number','user','total','date'
    ];
}
