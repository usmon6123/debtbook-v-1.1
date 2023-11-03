<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        protected UserRepository $userRepository,
        protected UserService    $userService,
    )
    {
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $this->userService->addOrUpdateDebtor($request->old_user_id ?? '', $request->name, $request->password ?? '', fake()->email(), 2, $request->phone_number, $request->description ?? '', $request->seller_id);

        return redirect()->route('dashboard');
    }

    public function edit($id)
    {
        $user = $this->userRepository->getUserById($id);
        if (isset($user))
            return view('user.create', ['user' => $user]);
        else return redirect()->route('dashboard');
    }

    public function update(Request $request)
    {
        $user = $this->userRepository->getUserById($request->old_user_id);

        if (isset($user)) {
            $this->userRepository->userUpdate($user->id, $request->name, $request->phone_number, $request->description ?? '',);
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->userService->deleteUser($id);
        return redirect()->route('dashboard');
    }

}
