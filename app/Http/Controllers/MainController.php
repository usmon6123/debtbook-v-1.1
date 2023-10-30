<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        echo 'index';
    }

    public function main()
    {
        if (isset($_SESSION)) {
            $_SESSION['search'] = 'no';
            session_destroy(); // Sessiyani o'chirish
        }


        $debtors = User::orderBy('updated_at', 'desc')->paginate(30);
        return redirect('dashboard')->with('debtors', $debtors);
    }

    public function dashboard()
    {
        $total_debt_sum = User::sum('total');
//        dd($total_debt_sum);
        return view('dashboard')->with([
            'debtors' => User::where('role_id', 2)->orderBy('updated_at', 'desc')->paginate(30),
            'total_debt_sum'=>$total_debt_sum,
        ]);
    }

    public function search(Request $request)
    {
        $total_debt_sum = User::sum('total');

        session_start();
        session(['search' => 'yes']);
        $_SESSION['search'] = 'yes';
        $str = $request['str'] ?? '';
        $debtors = User::where('role_id', 2)
            ->where(function ($query) use ($str) {
                $query->where('phone_number', 'like', "%$str%")
                    ->orWhere('name', 'like', "%$str%");
            })
            ->latest()->paginate(100);
        return view('dashboard')->with([
            'debtors' => $debtors,
            'total_debt_sum'=>$total_debt_sum,

        ]);
    }

}
