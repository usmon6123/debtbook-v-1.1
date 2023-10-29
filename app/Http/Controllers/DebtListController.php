<?php

namespace App\Http\Controllers;

use App\Models\DebtList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DebtListController extends Controller
{
    public function getId($id)
    {

        $debtList = DebtList::where('debtor_id', $id)->orderBy('updated_at', 'desc')->paginate(15);
//        var_dump($debtList[0]->seller->id);
        return view('debt-list')->with('debtList', $debtList);
    }


    public function createForm(Request $request)
    {
//        dd($request);

        return view('debtList.create')->with([
            'debtor_id' => $request['debtorId'],
            'debtor_name' => $request['debtorName'],
            'seller_id' => $request['sellerId'],
            'total' => $request['total'],
        ]);

    }

    public function create()
    {
        return view('debtList.create');
    }

    public function store(Request $request)
    {
        $sum = $request['debt_sum'];
        if ($request['in_or_out'] == 1) {
            $sum = -1 * abs($request['debt_sum']);
        }
        DebtList::create([
            'debtor_id' => $request['debtor_id'],
            'debt_sum' => $sum,
            'in_or_out' => $request['in_or_out'],
            'seller_id' => $request['seller_id'],
            'description' => $request['description'],
        ]);
//        DB::table('debt_lists')->insert([
//            'debtor_id' => $request['debtor_id'],
//            'debt_sum' => $sum,
//            'in_or_out' => $request['in_or_out'],
//            'seller_id' => (int)$request['seller_id'],
//            'description' => $request['description'],
//            'created_at' => now(),
//            'updated_at' => now(),
//        ]);

        $this->updateTotalByDebtorId($request['debtor_id']);
        return redirect()->route('debt-list.getId',['id'=>$request['debtor_id']]);

//        return redirect('dashboard');
    }

    public function deleteByDebtorId(Request $request)
    {
        $this->clearHistory($request['debtor_id']);


        DebtList::create([
            'debtor_id' => $request['debtor_id'],
            'debt_sum' => 0,
            'in_or_out' => false,
            'seller_id' => $request['seller_id'],
            'description' =>  "mijoz eski barcha qarzlarini hisoblashdi!",
        ]);

        $this->updateTotalByDebtorId($request['debtor_id']);
        return redirect()->back();

//        dd($request['debtor_id']);

    }


    public function clearHistory($debtorId)
    {
        DebtList::where('debtor_id', $debtorId)->delete();

    }

    public function updateTotalByDebtorId($debtorId)
    {
        $a1 = DB::table('users as u')
            ->select('u.id', DB::raw('SUM(d.debt_sum) as total'))
            ->join('debt_lists as d', 'u.id', '=', 'd.debtor_id')
            ->groupBy('u.id');

        $userId = $debtorId; // O'zgartirish kerak bo'lgan foydalanuvchi ID-sini yozing

        $newTotal = DB::table($a1, 'a1')->where('id', $userId)->value('total') ?? 0;
        DB::table('users')
            ->where('id', $userId)
            ->update(['total' => $newTotal, 'updated_at' => now()]);

    }

}
