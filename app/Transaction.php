<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    const INCOME = 'income';
    const EXPENSES = 'expenses';

    public function subGroup() {
        return $this->belongsTo(SubGroup::class, 'subGroupId', 'id');
    }

    public function group() {
        return $this->belongsTo(Group::class, 'groupId', 'id');
    }

    public function transactionType($type) {
        if($type == 'pemasukan')
            return 'income';
        else if($type == 'pengeluaran')
            return 'expenses';
        else if ($type == 'income' || $type == 'expenses')
            return $type;
    }


}
