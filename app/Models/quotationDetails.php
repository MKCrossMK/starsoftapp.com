<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quotationDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_id',
        'tipo_quote',
        'no_quote',
        'documento',
        'fecha',
        'product_id',
        'precio',
        'cantidad',
        'costo',
        'descuento',
        'total',
        'prod_itbis',
    ];


    public function product(){
        return $this->belongsTo(Product::class);

    }

    public function quote(){
        return $this->belongsTo(Quotation::class);
    }

}
