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
        return $query->whereDay('bod', '>', Carbon::parse('last sunday')->day)
            ->whereDay('bod', '<', Carbon::parse('this sunday')->day);
    }

    public function scopeBirthdayThisMonth($query)
    {
        return $query->whereMonth('bod', '=', Carbon::now()->month);
    }

    public function scopeBirthdayTomorrow($query)
    {
        return $query->whereDay('bod', '=', Carbon::parse('tomorrow')->day);
    }

    public function scopeAttendOnDate($query, $date)
    {
        return $query->select('first_name', 'last_name')
            ->join('attendances', 'members.id', '=', 'attendances.member_id')
            ->whereDate('attendances.date', $date);
    }
}
