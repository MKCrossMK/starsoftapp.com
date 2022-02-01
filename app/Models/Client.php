<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Client extends Model
{
    use HasFactory;

    protected $fillable  = [
        'id_erp',
        'cedula_rnc',
        'name',
        'lastname',
        'company_name',
        'address',
        'phone',
        'second_phone',
        'third_phone',
        'email',
        'tipo_comprobante',
        'vendedor',
        'tipo_pago',
        'balance',
        'porciento_descuento',
        'tipo_registro',
        
    ];


    public function findbyname($q){
                
        $cliente = DB::table('clients')
        ->where('cedula_rnc', 'like', "%$q%")
        ->get();

                
        return json_decode( json_encode( $cliente ), true );
    }

    public function findbyced($q){
                
        $cliente = DB::table('clients')
        ->where(DB::raw("CONCAT(name,' ',lastname)"), 'like', "%$q%")
        ->get();

        
        return json_decode( json_encode( $cliente ), true );
     
    }

    public function findbycompany($q){
                
        $cliente = DB::table('clients')
        ->where('company_name', 'like', "%$q%")
        ->get();

                
        return $cliente;
    }
    
}
