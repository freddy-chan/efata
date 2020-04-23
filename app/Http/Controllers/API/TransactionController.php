<?php

namespace App\Http\Controllers\API;

use App\Group;
use App\SubGroup;
use Carbon\Carbon;
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
            Log::debug($request);
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

    public function show($transactionId) {
        $transaction = Transaction::where('id', $transactionId)->get();

        return $this->setFromToAccountGroupName($transaction,  $transaction[0]->orgId);

    }

    public function showBasedOnGroup($groupId)
    {
        $transactions = Transaction::where('groupId', $groupId)
            ->orderBy('transactionDate')
            ->get();

        return $this->setFromToAccountGroupName($transactions,  $transactions[0]->orgId);
    }

    public function showBasedOnOrganization($orgId)
    {
        $transactions = Transaction::where('orgId', $orgId)
            ->orderBy('transactionDate')
            ->get();

        return $this->setFromToAccountGroupName($transactions, $orgId);
    }

    public function showWeekly(Request $request, $orgId)
    {
        $fromDate = new Carbon($request->get('fromDate'));
        $toDate = new Carbon($request->get('toDate'));
        $arr = [];
        $subGroups = SubGroup::where('orgId', $orgId)->get();
//        dd($fromDate);
        foreach ($subGroups as $subGroup) {
            $item['description'] = $subGroup->name;
            $count = 1;

            do {
//                dump( $fromDate->startOfWeek()->toDateString());
                $transactions = Transaction::select('groupId', 'subGroupId', 'type', 'amount')
                    ->whereBetween('transactionDate', [
                        $fromDate->startOfWeek()->format('Y-m-d'),
                        $fromDate->endOfWeek()->format('Y-m-d')
                    ])
                    ->where('subGroupId', $subGroup->id)
                    ->orderBy('groupId')
                    ->get();

                $item['debit' . $count] = 0;
                $item['credit' . $count] = 0;

                foreach ($transactions as $transaction) {
//                    echo $count . ' ';
                    if ($transaction->type == 'income')
                        $item['debit' . $count] += $transaction->amount;
                    else
                        $item['credit' . $count] += $transaction->amount;
                }
                $count++;
                $fromDate = $fromDate->addDays(1);
            } while ($fromDate->diffInDays($toDate, false) > 0);
            $arr['items'][] = $item;
//            $item = [];
            $fromDate = $fromDate->subDay(7*($count-1));
        }
//        dd("stop");
        return $arr;
    }

    public function showMonthly(Request $request, $orgId)
    {
        $transactions = Transaction::select('transactionDate', 'description', 'type', 'amount')
            ->where('orgId', $orgId)
            ->whereBetween('transactionDate', [
                new Carbon($request->get('fromMonth')),
                new Carbon($request->get('toMonth'))
            ])
            ->orderBy('transactionDate')
            ->get();

        $transactions = $transactions->map(function ($transaction) {
           if($transaction->type == 'income') {
               $amountIncome = $transaction->amount;
               $amountExpenses = 0;
           } else {
               $amountIncome = 0;
               $amountExpenses = $transaction->amount;
           }

           return [
                'transactionDate' => $transaction->transactionDate,
                'description' => $transaction->description,
                'debit' => $amountIncome,
                'credit' => $amountExpenses,
                'type' => $transaction->type
           ];
        });

        return $transactions;
    }

    public function showBasedOnOrganizationDateRange($orgId, $from, $to)
    {
        $transactions = Transaction::where('orgId', $orgId)
            ->whereBetween('transactionDate', [$from, $to])
            ->get();

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
        try {
            Log::debug($request);
            $transaction = Transaction::find($id);
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
