<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    public function transactionType($type) {
        if($type == 'pemasukan')
            return 'income';
        else if($type == 'pengeluaran')
            return 'expenses';
        else if ($type == 'income' || $type == 'expenses')
            return $type;
    }
}
