<?php

namespace App;

use App\Attendance;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    protected $fillable = ['first_name', 'middle_name', 'last_name', 'nickname', 'email', 'bod',
        'birth_place', 'gender', 'marital_status', 'address', 'address2', 'city', 'state',
        'country', 'zip_code', 'phone', 'home_phone'];

    public function attendance() {
        return $this->hasMany('App\Attendance','member_id', 'id');
    }

    public function scopeActive($query) {
        return $query->where('status', 'active');
    }

    public function scopeBirthdayThisWeek($query)
    {
        return $query->whereDay('bod', '>', Carbon::parse('last sunday')->day)
            ->orWhereDay('bod', '<', Carbon::parse('this sunday')->day);
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

    public function scopeSortBasedLastNameAndHideInactive($query)
    {
        return $query->where('status', '=', 'active')
            ->orderBy('last_name');
    }
}
