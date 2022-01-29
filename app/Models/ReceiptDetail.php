<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiptDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'receipt_id',
        'sales_id',
        'documento',
        'no_factura',
        'ncf',
        'balance',
        'total'
    ];


    public function sale(){
        return $this->belongsTo(Sale::class);
    }
}