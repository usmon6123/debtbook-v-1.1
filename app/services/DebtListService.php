<?php

namespace App\services;

use App\Interfaces\DebtListRepositoryInterface;

class DebtListService
{
    public function __construct(protected DebtListRepositoryInterface $debtListRepository)
    {
    }

    public function add(int $debtor_id, mixed $debt_sum, mixed $in_or_out, int $seller_id, mixed $description)
    {
        $sum = $debt_sum;
        if ($in_or_out == 1) {
            $sum = -1 * abs($debt_sum);
        }
        $this->debtListRepository->addDebtList($debtor_id, $sum, $in_or_out, $seller_id, $description);
    }

    public function deleteByDebtorId(int $debtor_id, int $seller_id, mixed $debt_sum)
    {
        $this->debtListRepository->clearHistory($debtor_id);
        $this->debtListRepository->addDebtList($debtor_id,
            0,
            false,
            $seller_id,
            $debt_sum." so'm berib, oldingi barcha qarzlarini uzdi");

        $this->debtListRepository->updateTotalByDebtorId($debtor_id);

    }
}
