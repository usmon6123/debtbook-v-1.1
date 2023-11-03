<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    //ASOSIY MENYU UCHUN BARCHA DEBTOR ROLIDAGI USERLARNI PAGEGA O'RAB BAZADAN OLIB KELADI
    public function getAllDebtorsLatestPaginate(int $count);

    public function allDebtorsDebt();

    public function searchDebtorsByStrPaginate(mixed $str, int $count);


}
