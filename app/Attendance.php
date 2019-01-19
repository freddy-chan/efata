<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = "attendances";

    public function Member() {
        return $this->belongsTo('App\Member', 'id', 'member_id');
    }

    public function scopeMemberThatAttend($query, $date)
    {
        return $query->whereDate('date', $date);
    }
}
