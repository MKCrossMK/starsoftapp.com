<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        // 'tipo_quote',
        // 'no_quote',
        // 'documento',
        'fecha',
        'monto',
        'itbis',
        'descuento',
        'client_id',
        'nombre_cliente',
        'nombre_vendedor',
        'nombre_usuario',
        'registradopor'
        

    ];

    public function user(){
        return $this->BelongsTo(User::class, 'user_id', 'id');
    }

    public function client(){
        return $this->BelongsTo(Client::class);
    }

    public function quoteDetail(){
        return $this->hasMany(quotationDetails::class);
    }


}
