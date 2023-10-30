<?php

namespace App\Http\Controllers;

use App\Models\DebtList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        if (!isset($request->old_user_id)) {
//            dd($request);
            $user = User::create([
                'name' => $request->name,
                'password' => Hash::make($request->phone_number),
                'email' => fake()->email(),
                'role_id' => 2,
                'phone_number' => $request->phone_number,
                'description' => $request->description,
            ]);

            DebtList::create([
                'debtor_id' => $user->id,
                'debt_sum' => 0,
                'in_or_out' => false,
                'seller_id' => $request['seller_id'],
                'description' => "Yangi qarzdor",
            ]);
        } else {
            User::where('id', $request->old_user_id)
                ->update([
                    'name' => $request->name,
                    'phone_number' => $request->phone_number,
                    'description' => $request->description
                ]);


        }

        return redirect()->route('dashboard');
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->get()->first();
//dd($user);
        if (isset($user))
            return view('user.create', ['user' => $user]);
        else return redirect()->route('dashboard');
    }

    public function update(Request $request)
    {
        $user = User::where('id', $request->old_user_id)->get()->first();

        if (isset($user)) {
            User::update([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'description' => $request->description,
            ]);
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user && $user->total == '0') {
            $user->delete();
        }
        return redirect()->route('dashboard');
    }

}
