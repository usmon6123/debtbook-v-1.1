<?php

namespace App\Http\Controllers;

use App\Models\DebtList;
use App\Models\User;
use Illuminate\Http\Request;

class DebtListController extends Controller
{
    public function getId($id){
        $debtList =  DebtList::where('debtor_id',$id)->latest()->paginate(15);
        return view('debt-list')->with('debtList',$debtList);
    }
}
