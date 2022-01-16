<?php

namespace App\Http\Controllers\API\Checkout;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Model\Product;
use App\Model\Transaction;
use App\Model\TransactionDetail;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(CheckoutRequest $request)
    {
        // Take all the request body except transaction_details field
        $validatedData = $request->except('transaction_details');
        // Create UUID TRX
        $validatedData['uuid'] = 'TRX' . mt_rand(10000, 99999) . mt_rand(100, 999);
        // Save to Transaction Model
        $transaction = Transaction::create($validatedData);

        // Looping the transaction_details array product ($product=id)
        foreach ($request->transaction_details as $product) {
            // Instantiate TransactionDetail Model with its data
            $transaction_details[] = new TransactionDetail([
                'products_id' => $product,
                'transactions_id' => $transaction->id
            ]);
            // Find the current product and decrement it
            Product::find($product)->decrement('quantity');
        }
        // Save the transaction details through relationship
        $transaction->transaction_details()->saveMany($transaction_details);

        return ResponseFormatter::success($transaction, 'Checkout successfully', 201);
    }
}
