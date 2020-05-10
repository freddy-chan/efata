<?php

namespace Tests\Unit;


use App\Transaction;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransactionTest extends TestCase
{
    use RefreshDatabase;

    public function testWeeklyReportOneWeek()
    {
        $this->seed();

        $fromDate = Carbon::today()->subDays(14)->startOfWeek()->toDateString();
        $toDate = Carbon::today()->toDateString();
        factory(Transaction::class, 'income')->create([
            'amount' => 100,
            'type' => 'income',
            'transactionDate' => $fromDate
        ]);

        factory(Transaction::class, 'income')->create([
            'amount' => 101,
            'type' => 'income',
            'transactionDate' => (new Carbon($fromDate))->addDays(7)->startOfWeek()->toDateString()
        ]);

        factory(Transaction::class, 'income')->create([
            'amount' => 200,
            'type' => 'income'
        ]);

        factory(Transaction::class, 'income')->create([
            'amount' => 101,
            'type' => 'income',
            'subGroupId' => 2
        ]);

        factory(Transaction::class, 'income')->create([
            'amount' => 202,
            'type' => 'income',
            'subGroupId' => 2
        ]);

        factory(Transaction::class, 'income')->create([
            'amount' => 300,
            'type' => 'expenses',
            'transactionDate' => $fromDate
        ]);

        factory(Transaction::class, 'income')->create([
            'amount' => 400,
            'type' => 'expenses'
        ]);

        $response = $this->get('/api/transactions/org/1/weekly?fromDate=' . $fromDate . '&toDate=' . $toDate);
        $content = json_decode($response->content(), true);
        $this->assertEquals($content['items'][0]['debit1'], 100);
        $this->assertEquals($content['items'][1]['debit2'], 100);
        $this->assertEquals($content['items'][0]['debit3'], 200);
        $this->assertEquals($content['items'][1]['debit3'], 303);
        $this->assertEquals($content['items'][0]['credit1'], 300);
        $this->assertEquals($content['items'][0]['credit3'], 400);
    }
}
