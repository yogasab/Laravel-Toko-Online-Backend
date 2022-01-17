<?php

namespace App\Http\Controllers\API\Transaction;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Model\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function get(Transaction $transaction)
    {
        $transactions = Transaction::with(['transaction_details.product'])->find($transaction);

        if ($transactions)
            return ResponseFormatter::success($transactions, 'Transactions fetched successfully');
        else
            return ResponseFormatter::errors(null, 'Transactions not found');
    }
}
