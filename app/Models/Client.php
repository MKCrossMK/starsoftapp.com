<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $filliable = [
          'name',
          'lastname',
          'cedula',
          'address',
          'phone',
          'email'
    ];
}
