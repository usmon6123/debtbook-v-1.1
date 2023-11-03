<?php

namespace App\services;


use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Carbon;

class MainService
{
    public function __construct(
        protected UserRepositoryInterface $userRepository)
    {
    }

    public function allDebtorsLatestPaginate(int $count)
    {
        if (isset($_SESSION)) {
            $_SESSION['search'] = 'no';
            session_destroy();
        }
        //PAGEGA O'RAB BAZADAN BARCHA QARZDORLARNI OLIB QAYTARIB YUBORAMIZ
        return $this->userRepository->getAllDebtorsLatestPaginate($count);

    }

    public function dateFormat($created_at):string
    {
        return Carbon::parse($created_at)->format('d-m-y || H:i');
    }

    public function getDebtorsPaginateByStr(string $str, int $count)
    {
        if (!(isset($_SESSION) && $_SESSION['search'] == 'yes')) {
            session_start();
            session(['search' => 'yes']);
            $_SESSION['search'] = 'yes';
        }
        return $this->userRepository->searchDebtorsByStrPaginate($str, $count);
    }
}
