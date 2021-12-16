<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Sale extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
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
        'tipo_ncf',
        'ncf',

    ];

    public function user(){
        return $this->BelongsTo(User::class, 'user_id', 'id');
    }

    public function client(){
        return $this->BelongsTo(Client::class);
    }

    public function saleDetail(){
        return $this->hasMany(SaleDetail::class);
    }


  


}
