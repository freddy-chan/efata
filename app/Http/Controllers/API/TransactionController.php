<?php

namespace App\Http\Controllers\API;

use Log;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        try {
            Log::info($request);
            $transaction = new Transaction();
            $transaction->groupId = $request->get('group');
            $transaction->subGroupId = $request->get('subgroup');
            $transaction->fromAccountId = $request->get('fromAccount');
            $transaction->toAccountId = $request->get('toAccount');
            $transaction->description = $request->get('keterangan');
            $transaction->currency = $request->get('currency');
            $transaction->amount = $request->get('amount');
            $transaction->orgId = $request->get('orgId');
            $transaction->transactionDate = $request->get('tanggal');
            $transaction->type = $transaction->transactionType($request->get('type'));
            $transaction->userId = $request->get('user');
            $transaction->save();

            return response('ok', 200);
        } catch(Exception $e) {
            return response($e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
