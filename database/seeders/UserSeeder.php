<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        User::create([
            'name' => 'Usmon',
            'role_id' => 1,
            'password' => Hash::make('access'),
            'phone_number'=>'+998995096123',
            'email'=>'seller1@gmail.com'
        ]);
        User::create([
            'name' => 'Abdulla',
            'role_id' => 1,
            'password' => Hash::make('access'),
            'phone_number'=>'+998970336123',
            'email'=>'seller2@gmail.com'
        ]);
        User::create([
            'name' => 'Javokhir',
            'role_id' => 1,
            'password' => Hash::make('access'),
            'phone_number'=>'+998883336123',
            'email'=>'seller3@gmail.com'
        ]);
        User::create([
            'name' => 'Makhmud',
            'role_id' => 2,
            'password' => Hash::make('access'),
            'phone_number'=>'+998902447682',
            'email'=>'debtor1@gmail.com'
        ]);
        User::factory()->count(50)->create();
    }
}
