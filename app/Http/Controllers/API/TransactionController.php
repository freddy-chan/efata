<?php

namespace App\Http\Controllers\API;

use App\Group;
use App\SubGroup;
use Log;
use App\Account;
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
     * @param  int  $groupId
     * @return \Illuminate\Http\Response
     */
    public function showBasedOnGroup($groupId)
    {
        $transactions = Transaction::where('groupId', $groupId)->get();

        return $this->setFromToAccountGroupName($transactions,  $transactions[0]->orgId);
    }

    public function showBasedOnOrganization($orgId)
    {
        $transactions = Transaction::where('orgId', $orgId)->get();

        return $this->setFromToAccountGroupName($transactions, $orgId);
    }

    private function setFromToAccountGroupName($transactions, $orgId) {
        $accounts = Account::where('orgId', $orgId)->get();
        $groups = Group::where('orgId', $orgId)->get();
        $subGroups = SubGroup::where('orgId', $orgId)->get();

        for($i = 0; $i < count($transactions) ; $i++) {
            $transactions[$i]->fromAccountName = $accounts[$transactions[$i]->fromAccountId - 1]->name;
            $transactions[$i]->toAccountName = $accounts[$transactions[$i]->toAccountId - 1]->name;
            $transactions[$i]->groupName = $groups[$transactions[$i]->groupId - 1]->name;
            $transactions[$i]->subGroupName = $subGroups[$transactions[$i]->subGroupId - 1]->name;
        }

        return $transactions;
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
