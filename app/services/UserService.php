<?php

namespace App\services;

use App\Interfaces\DebtListRepositoryInterface;
use App\Repositories\DebtListRepository;
use App\Repositories\UserRepository;

class UserService
{
    public function __construct(
        protected UserRepository     $userRepository,
        protected DebtListRepositoryInterface $debtListRepository,
    )
    {
    }


    public function createNewDebtor(string $name, string $password, string $email, int $role_id, string $phone_number, string $description, int $seller_id)
    {
        $user = $this->userRepository->createUser($name, $password, $email, $role_id, $phone_number, $description ?? '');

        $this->debtListRepository->createDebtListForNewDebtor($user->id, $seller_id);
    }

    public function addOrUpdateDebtor(mixed $user_id, string $name, string $password, string $email, int $role_id, string $phone_number, string $description, int $seller_id)
    {
        //QARZDOR BAZADA BO'LMASA CREATE QILADI AKS HOLDA UPDATE
        if ($user_id == '') {
            if ($password == '') $password = $phone_number;
            $this->createNewDebtor($name, $password, $email, $role_id, $phone_number, $description ?? '', $seller_id);
        } else {
            $this->userRepository->userUpdate($user_id, $name, $phone_number, $description);
        }
    }

    public function deleteUser($id)
    {
        $user = $this->userRepository->existsUser($id);

        if ($user && $user->total == '0') {
            $user->delete();
            $this->debtListRepository->deletedByDebtorId($id);
        }
    }

}
