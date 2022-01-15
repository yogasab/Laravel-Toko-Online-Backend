<?php

namespace App\Http\Controllers\Web\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Model\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::latest()->get();

        return view('pages.transactions.index')->with([
            'transactions' => $transactions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::with('transaction_details.product')->findOrFail($id);

        return view('pages.transactions.show')->with([
            'transaction' => $transaction
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        return view('pages.transactions.edit')->with([
            'transaction' => $transaction
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, Transaction $transaction)
    {
        $validatedData = $request->all();

        $transaction->update($validatedData);

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully');
    }

    public function setStatus(Transaction $transaction, Request $request)
    {
        $validatedStatus = $request->validate([
            'status' => 'required|in:PENDING,SUCCESS,FAILED'
        ]);

        $transaction->transaction_status = $request->status;
        $transaction->save();

        return redirect()->route('transactions.index')->with('success', 'Status updated successfully');
    }
}
