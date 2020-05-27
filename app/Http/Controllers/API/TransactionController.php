<?php

namespace App\Http\Controllers\API;

use App\Group;
use App\SubGroup;
use Carbon\Carbon;
use Log;
use DB;
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

    public function getDateHeader($fromDate, $toDate)
    {
        do {
            $dateHeader[] = $fromDate->startOfWeek()->format('d/m/Y') . ' - ' .
                $fromDate->endOfWeek()->format('d/m/Y');
            $fromDate = $fromDate->addDays(1);
        } while($fromDate->lessThan($toDate));

        return $dateHeader;
    }

    public function getDateRange($fromDate, $toDate)
    {
        do {
            $dateRange[] = $fromDate->startOfWeek()->format('Y-m-d');
            $dateRange[] = $fromDate->endOfWeek()->format('Y-m-d');
            $fromDate = $fromDate->addDays(1);
        } while($fromDate->lessThan($toDate));

        return $dateRange;
    }

    public function getHeader($count)
    {
        for($i=0;$i<$count;$i+=2) {
            $header[] = 'debit';
            $header[] = 'credit';
        }

        return $header;
    }

    public function getGroupTotalBasedDateRange($fromDate, $toDate, $groupId, $type = Transaction::INCOME)
    {
        $transaction = Transaction::select(DB::raw("sum(amount) as total"))
            ->whereBetween('transactionDate', [$fromDate, $toDate])
            ->where('type', $type)
            ->where('groupId', $groupId)
            ->groupBy('groupId')
            ->first();

        if($transaction)
            return (int) $transaction->total;

        return 0;
    }

    public function getSubGroupTotalBasedDateRange($fromDate, $toDate, $groupId, $type = Transaction::INCOME)
    {
        $transaction = Transaction::select(DB::raw("sum(amount) as total"))
            ->whereBetween('transactionDate', [$fromDate, $toDate])
            ->where('type', $type)
            ->where('subGroupId', $groupId)
            ->groupBy('subGroupId')
            ->first();

        if($transaction)
            return (int) $transaction->total;

        return 0;
    }

    public function showWeekly(Request $request, $orgId)
    {
        $fromDate = new Carbon($request->get('fromDate'));
        $toDate = new Carbon($request->get('toDate'));
        $arr = [];
        $subGroups = SubGroup::where('orgId', $orgId)->get();
        $groups = Group::where('orgId', $orgId)->get();
        $dateRanges = $this->getDateRange(new Carbon($request->get('fromDate')), new Carbon($request->get('toDate')));
        $countGroup = 0;

        $arr['fromDate'] = $fromDate->startOfWeek()->format('d/m/Y');
        $arr['toDate'] = $toDate->endOfWeek()->format('d/m/Y');
        $arr['dateHeader'] = $this->getDateHeader(new Carbon($request->get('fromDate')), new Carbon($request->get('toDate')));
        $arr['header'] = $this->getHeader(count($dateRanges));
        $arr['columnCount'] = count($dateRanges) + 2;

        foreach($groups as $group) {
            $arr['groups'][$countGroup]['name'] = $group->name;
            $arr['groups'][$countGroup]['id'] = $group->id;
            $countSubGroup = 0;
            $groupTotal = 0;

            foreach($subGroups as $subGroup) {
                $subGroupTotal = 0;
                if($subGroup->group->id == $group->id) {
                    $arr['groups'][$countGroup]['subgroups'][$countSubGroup]['name'] = $subGroup->name;
                    for($i=0;$i<count($dateRanges);$i+=2) {
                        $debit = $this->getSubGroupTotalBasedDateRange($dateRanges[$i], $dateRanges[$i + 1], $subGroup->id);
                        $credit = $this->getSubGroupTotalBasedDateRange($dateRanges[$i], $dateRanges[$i + 1], $subGroup->id, Transaction::EXPENSES);
                        $arr['groups'][$countGroup]['subgroups'][$countSubGroup]['totals'][] = $debit;
                        $arr['groups'][$countGroup]['subgroups'][$countSubGroup]['totals'][] = $credit;
                        $subGroupTotal += ($debit - $credit);
                    }
                    $arr['groups'][$countGroup]['subgroups'][$countSubGroup]['total'] = $subGroupTotal;
                    $countSubGroup++;
                }
            }

            for($i=0;$i<count($dateRanges);$i+=2) {
                $debit = $this->getGroupTotalBasedDateRange($dateRanges[$i], $dateRanges[$i+1], $group->id);
                $credit = $this->getGroupTotalBasedDateRange($dateRanges[$i], $dateRanges[$i+1], $group->id, Transaction::EXPENSES);
                $arr['groups'][$countGroup]['totals'][] = $debit;
                $arr['groups'][$countGroup]['totals'][] = $credit;
                $groupTotal += ($debit - $credit);
            }

            $arr['groups'][$countGroup]['total'] = $groupTotal;
            $countGroup++;
        }
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
