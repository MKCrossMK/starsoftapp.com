<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $filliable = [
        'user_id',
        'purchase_date',
        'impuesto',
        'total',
        'status',
        'picture',


    ];

    public function user(){ 
        return $this->belongsTo(User::class);
    }

    public function purchaseDetails(){
        return $this->hasMany(PurchaseDetail::class);
    }
}
