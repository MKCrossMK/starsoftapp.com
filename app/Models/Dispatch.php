<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispatch extends Model
{
    use HasFactory;

    protected $fillable = [

        'no_factura',
        'fecha',
        'code_chofer',
        'descrip_chofer',
        'code_vendedor',
        'name_vendedor',
        'code_cliente',
        'name_cliente',
        'phone_cliente',
        'address_provicia',
        'address_municipio',
        'address_sector',
        'status',
        'bultos_paquetes'
      
        
    ];

}
