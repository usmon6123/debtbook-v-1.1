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
        $_SESSION['search'] = 'no';
        session_destroy();

        $debtors = User::paginate(12);
        return redirect('dashboard')->with('debtors', $debtors);
    }

    public function dashboard()
    {
        return view('dashboard')->with([
            'debtors' => User::where('role_id', 2)->latest()->paginate(10),
        ]);
    }

    public function search(Request $request)
    {
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
        ]);
    }
}
