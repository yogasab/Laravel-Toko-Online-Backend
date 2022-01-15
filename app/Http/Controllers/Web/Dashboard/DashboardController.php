<?php

namespace App\Http\Controllers\Web\Dashboard;

use App\Http\Controllers\Controller;
use App\Model\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $income = Transaction::where('transaction_status', 'SUCCESS')->sum('transaction_total');
        $sales = Transaction::count();
        $transactions = Transaction::orderBy('id', 'DESC')->take(5)->get();
        $pie = [
            'success' => Transaction::where('transaction_status', 'SUCCESS')->count(),
            'failed' => Transaction::where('transaction_status', 'FAILED')->count(),
            'pending' => Transaction::where('transaction_status', 'PENDING')->count(),
        ];

        return view('pages.dashboard')->with([
            'income' => $income,
            'sales' => $sales,
            'transactions' => $transactions,
            'pie' => $pie
        ]);
    }
}
