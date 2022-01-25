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
          'name',
          'lastname',
          'company_name',
          'cedula_rnc',
          'address',
          'phone',
          'second_phone',
          'third_phone',
          'email',
          'tipo_comprobante',
          'tipo_pago',
        
    ];


    public function findbyname($q){
                
        $cliente = DB::table('clients')
        ->where('cedula_rnc', 'like', "%$q%")
        ->get();

                
        return $cliente;
    }

    public function findbyced($q){
                
        $cliente = DB::table('clients')
        ->where(DB::raw("CONCAT(name,' ',lastname)"), 'like', "%$q%")
        ->get();

                
        return $cliente;
    }

    public function findbycompany($q){
                
        $cliente = DB::table('clients')
        ->where('company_name', 'like', "%$q%")
        ->get();

                
        return $cliente;
    }
    
}
