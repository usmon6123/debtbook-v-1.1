<?php

namespace App\Http\Controllers;

use App\Interfaces\UserRepositoryInterface;
use App\services\MainService;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __construct(
        protected MainService             $mainService,
        protected UserRepositoryInterface $userRepository)
    {
    }


    public function main()
    {
        $debtors = $this->mainService->allDebtorsLatestPaginate(30);

        return redirect('dashboard')->with('debtors', $debtors);
    }

    public function dashboard()
    {
        //BARCHA QARZDORLAR VA JAMI QARZDORLIK SUMMASINI DASHBORDGA BERIB YUBORYAPMIZ
        return view('dashboard')->with([
            'debtors' => $this->userRepository->getAllDebtorsLatestPaginate(30),
            'total_debt_sum' => $this->userRepository->allDebtorsDebt(),
        ]);
    }

    public function search(Request $request)
    {
        $str = $request['str'] ?? '';

        //REQUESTDA KELGAN TEXTNI USERNING ISMI IDSI VA RAQAMI ORQALI BAZADAN SEARCH QILIB TO'PLAB PAGE QILIB OLIB KELADI
        $debtors = $this->mainService->getDebtorsPaginateByStr($str, 100);

        //BARCHANING QARZLARINI TO'PLAB KELADI
        $total_debt_sum = $this->userRepository->allDebtorsDebt();

        return view('dashboard')->with([
            'debtors' => $debtors,
            'total_debt_sum' => $total_debt_sum,
        ]);
    }

}
