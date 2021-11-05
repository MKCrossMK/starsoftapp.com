<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    use HasFactory;

    protected $filliable = [
        'user_id'.
        'tipo_factura',
        'no_factura',
        'documento',
        'fecha',
        'monto',
        'itbis',
        'descuento',
        't_pago',
        't_cobro',
        'client_id',
        'client_name',
        'tipo_ncf',
        'ncf',

    ];

    public function user(){
        return $this->BelongsTo(User::class);
    }

    public function client(){
        return $this->BelongsTo(User::class);
    }

    public function saleDetail(){
        return $this->hasMany(SaleDetail::class);
    }


}
