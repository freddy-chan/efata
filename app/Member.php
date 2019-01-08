<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';

    public function scopeActive() {
        return $this->where('status', 'active');
    }

    public function scopeBirthdayThisWeek()
    {
        return $this->where('bod', '>', Carbon::parse('last sunday')->toDateString(), 'and')
            ->where('bod', '<', Carbon::parse('this sunday')->toDateString());
    }

    public function scopeBirthdayThisMonth()
    {
        return $this->where('bod', '>', Carbon::parse('first day of this month')->toDateString(), 'and')
            ->where('bod', '<', Carbon::parse('last day of this month')->toDateString());
    }
}
