<?php

namespace App\Http\Controllers;

use App\Interfaces\DebtListRepositoryInterface;
use App\services\DebtListService;
use Illuminate\Http\Request;

class DebtListController extends Controller
{
    public function __construct(
        protected DebtListRepositoryInterface $debtListRepository,
        protected DebtListService             $debtListService
    )
    {
    }

    public function index()
    {
        $debtsList = $this->debtListRepository->allDebtListLatestPaginate(30);
        return view('debtList.history')->with(['debtsList' => $debtsList ?? []]);
    }

    public function getId($id)
    {
        $debtList = $this->debtListRepository->getByDebtorIdlatestPaginate($id, 30);
        return view('debt-list')->with('debtList', $debtList);
    }


    public function createForm(Request $request)
    {
        return view('debtList.create')->with([
            'debtor_id' => $request['debtorId'],
            'debtor_name' => $request['debtorName'],
            'seller_id' => auth()->user()->id,
            'total' => $request['total'],
        ]);
    }

    public function create()
    {
        return view('debtList.create');
    }

    public function store(Request $request)
    {
        $this->debtListService->add($request['debtor_id'], $request['debt_sum'], $request['in_or_out'], $request['seller_id'], $request['description'] ?? '',);
        $this->debtListRepository->updateTotalByDebtorId($request['debtor_id']);
        return redirect()->route('debt-list.getId', ['id' => $request['debtor_id']]);

    }

    public function deleteByDebtorId(Request $request)
    {
        $this->debtListService->deleteByDebtorId($request['debtor_id'], $request['seller_id'], $request['debt_sum']);

        return redirect()->back();
    }
}
