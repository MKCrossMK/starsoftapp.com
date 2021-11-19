<?php

namespace Database\Seeders;

use \Hash;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => env('EMAIL_ADMIN'),
            'password' => Hash::make(env('PASSWORD_ADMIN')),
            'name' => 'admin',
            'id_erp' => 0
        ]);
    }
}
