<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = array(
            [
                'name' => 'Admin Pertamanan',                
                'username' => 'admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
            ],
        );
        foreach($data AS $d){
            User::create([
                'name' => $d['name'],
                'username' => $d['username'],
                'email' => $d['email'],
                'password' => $d['password'],
                'role' => $d['role']
            ]);
        }
    }
}