<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Petar Petrovic',
            'email' => 'pera@gmail.com',
            'password' => md5('pera123')
        ]);
        User::create([
            'name' => 'Laza Lazic',
            'email' => 'laza@gmail.com',
            'password' => md5('laza123')
        ]);

        User::create([
            'name' => 'Marko Markovic',
            'email' => 'admin@gmail.com',
            'password' => md5('admin123'),
            'role_id' => 11
        ]);
    }
}
