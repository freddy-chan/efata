<?php

namespace App;

use App\Attendance;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';

    public function attendance() {
        return $this->hasMany('App\Attendance','member_id', 'id');
    }

    public function scopeActive($query) {
        return $query->where('status', 'active');
    }

    public function scopeBirthdayThisWeek($query)
    {
        return $query->where('bod', '>', Carbon::parse('last sunday')->toDateString(), 'and')
            ->where('bod', '<', Carbon::parse('this sunday')->toDateString());
    }

    public function scopeBirthdayThisMonth($query)
    {
        return $query->where('bod', '>', Carbon::parse('first day of this month')->toDateString(), 'and')
            ->where('bod', '<', Carbon::parse('last day of this month')->toDateString());
    }

    public function scopeAttendOnDate($query, $date)
    {
        return $query->select('first_name', 'last_name')
            ->join('attendances', 'members.id', '=', 'attendances.member_id')
            ->whereDate('attendances.date', $date);
    }
}
