<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Desarrollador',
            'email' => 'jesus_sastre@hotmail.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('Admin');

        User::create([
            'name' => 'Desarrollador',
            'email' => 'juputepix5@gmail.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('Admin');
    }
}
