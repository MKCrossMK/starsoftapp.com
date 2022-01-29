<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'no_receipt',
        'fecha',
        'fecha_vencimiento',
        'monto',
        'balance',
        'anulado',
        'concepto',
        'client_id',
    ];



    public function receiptDetail(){
        return $this->hasMany(receiptDetail::class);
    }
}
