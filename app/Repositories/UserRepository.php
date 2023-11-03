<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{

    public function getAllDebtorsLatestPaginate(int $count): LengthAwarePaginator
    {
        return User::where('role_id', 2)->orderBy('updated_at', 'desc')->paginate($count);

    }


    public function allDebtorsDebt()
    {
        return User::sum('total');
    }

    public function searchDebtorsByStrPaginate(mixed $str, int $count)
    {
        return User::where('role_id', 2)
            ->where(function ($query) use ($str) {
                $query->where('phone_number', 'like', "%$str%")
                    ->orWhere('name', 'like', "%$str%")
                    ->orWhere('id', 'like', "%$str%");
            })
            ->latest()
            ->paginate($count);
    }

    public function createUser(string $name, string $password, string $email, int $role_id, string $phone_number, string $description)
    {
        return User::create([
            'name' => $name,
            'password' => Hash::make($password),
            'email' => $email,
            'role_id' => $role_id,
            'phone_number' => $phone_number,
            'description' => $description??'',
        ]);
    }

    public function userUpdate(int $user_id, string $name, string $phone_number, string $description)
    {
        User::where('id', $user_id)
            ->update([
                'name' => $name,
                'phone_number' => $phone_number,
                'description' => $description??''
            ]);
    }

    public function getUserById($id)
    {
       return User::where('id', $id)->get()->first();
    }


    public function existsUser($id)
    {
        return User::find($id);
    }
}
