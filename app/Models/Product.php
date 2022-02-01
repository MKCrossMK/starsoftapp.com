<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [

        'code',
        'descripcion',
        'referencia_suplidor',
        'precio',
        'costo',
        'stock',
        
    ];

    
    public function findbyname($q){
                
        $cliente = DB::table('products')
        ->where('descripcion', 'like', "%$q%")
        ->get();

                
        return $cliente;
    }
    
    public function findbyref($q){
                
        $cliente = DB::table('products')
        ->where('code', 'like', "%$q%")
        ->get();

                
        return $cliente;
    }
    
}

