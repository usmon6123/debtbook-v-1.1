<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalculateTotalSumAndUpdateUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
// A1 jadvalini yaratish
        $a1 = DB::table('users as u')
            ->select('u.id', 'u.name', DB::raw('SUM(d.debt_sum) as total'))
            ->join('debt_lists as d', 'u.id', '=', 'd.debtor_id')
            ->groupBy('u.id');

        // A2 jadvalini yaratish
        $a2 = DB::table(DB::raw("({$a1->toSql()}) as a1"))
            ->select('a1.id', 'a1.total as totald');

        // "u" jadvallarini yangilash
        DB::table('users as u')
            ->joinSub($a2, 'a2', 'u.id', '=', 'a2.id')
            ->update(['u.total' => DB::raw('a2.totald')]);
    }
}
