<?php

namespace App\Repositories;

use App\Interfaces\DebtListRepositoryInterface;
use App\Models\DebtList;
use Illuminate\Support\Facades\DB;

class DebtListRepository implements DebtListRepositoryInterface
{

    public function createDebtListForNewDebtor(int $debtor_id, int $seller_id)
    {
        DebtList::create([
            'debtor_id' => $debtor_id,
            'debt_sum' => 0,
            'in_or_out' => false,
            'seller_id' => $seller_id,
            'description' => "Yangi qarzdor",
        ]);
    }

    public function allDebtListLatestPaginate(int $count)
    {
        return DebtList::orderBy('updated_at', 'desc')->paginate($count);
    }

    public function getByDebtorIdLatestPaginate(int $id, int $count)
    {
        return DebtList::where('debtor_id', $id)->orderBy('updated_at', 'desc')->paginate($count);
    }

    public function addDebtList(int $debtor_id, mixed $sum, mixed $in_or_out, int $seller_id, mixed $description)
    {
        return DebtList::create([
            'debtor_id' => $debtor_id,
            'debt_sum' => $sum,
            'in_or_out' => $in_or_out,
            'seller_id' => $seller_id,
            'description' => $description ?? '',
        ]);
    }

    public function updateTotalByDebtorId(int $debtor_id)
    {
        $a1 = DB::table('users as u')
            ->select('u.id', DB::raw('SUM(d.debt_sum) as total'))
            ->join('debt_lists as d', 'u.id', '=', 'd.debtor_id')
            ->groupBy('u.id');

        $userId = $debtor_id; // O'zgartirish kerak bo'lgan foydalanuvchi ID-sini yozing

        $newTotal = DB::table($a1, 'a1')->where('id', $userId)->value('total') ?? 0;
        DB::table('users')
            ->where('id', $userId)
            ->update(['total' => $newTotal, 'updated_at' => now()]);

    }

    public function clearHistory(int $debtor_id)
    {
        return DebtList::where('debtor_id', $debtor_id)->delete();
    }


    public function deletedByDebtorId($id)
    {
        return DebtList::where('debtor_id', $id)->update(['deleted_at' => now('Asia/Tashkent')]);

    }
}
