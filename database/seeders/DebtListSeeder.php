<?php

namespace Database\Seeders;

use App\Models\DebtList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DebtListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DebtList::factory()->count(121)->create();
    }
}
