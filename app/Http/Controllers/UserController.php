<?php

namespace App\Http\Controllers;

use App\Models\DebtList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function create(){
        return view('user.create');
    }

    public function store(Request $request){


        $user = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->phone_number),
            'email' => fake()->email(),
            'role_id' => 2,
            'phone_number'=>$request->phone_number,
        ]);

        DebtList::create([
            'debtor_id' => $user->id,
            'debt_sum' => 0,
            'in_or_out' => false,
            'seller_id' => $request['seller_id'],
            'description' => "Yangi qarzdor",
        ]);

        return redirect()->route('dashboard');
    }

    public function  edit($id){
        $user = User::find($id);

//        if ($user) {
//            $user->delete();
//        }
        return redirect()->route('dashboard');

    }
    public function destroy($id){
        $user = User::find($id);

        if ($user && $user->total == 0) {
            $user->delete();
        }
        return redirect()->route('dashboard');    }

}
