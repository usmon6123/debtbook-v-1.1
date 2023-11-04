<?php

namespace App\Interfaces;
interface DebtListRepositoryInterface{

    public function createDebtListForNewDebtor(int $debtor_id,int $seller_id);

    public function allDebtListLatestPaginate(int $count);

    public function getByDebtorIdLatestPaginate(int $id, int $count);

    public function addDebtList(int $debtor_id, mixed $sum, mixed $in_or_out, int $seller_id, mixed $description);

    public function updateTotalByDebtorId(int $debtor_id);

    public function clearHistory(int $debtor_id);

    public function deletedByDebtorId($id);


}
