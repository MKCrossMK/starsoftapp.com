<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    use HasFactory;


    protected $filliable = [
        'sale_id',
        'tipo_factura',
        'no_factura',
        'documento',
        'fecha',
        'product_id',
        'product_name',
        'precio',
        'cantidad',
        'costo',
        'itbis',
        'descuento',
        'total',
        'prod_itbis',
    ];


    public function product(){
        return $this->belongsTo(Product::class);

    }

    public function sale(){
        return $this->belongsTo(Sale::class);
    }


}
