<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion'
        
    ];

    public function client() {
        return $this->hasMany(Client::class, 'id', 'province');
    }
    


}
