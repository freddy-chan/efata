<?php

namespace App;

use App\Member;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = "attendances";

    public function member() {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }

    public function scopeMemberThatAttend($query, $date)
    {
        return $query->whereDate('date', $date);
    }

    public function summary($count = 4)
    {
        $sunday = Carbon::parse('sunday');
        for ($i =0 ; $i<$count ; $i++) {
            $attendances = $this
                ->join('members', 'member_id', 'members.id')
                ->whereDate('date', $sunday->toDateString())
                ->get();
            $summary[$sunday->toDateString()]['total'] = $attendances->count();
            $summary[$sunday->toDateString()]['M'] = 0;
            $summary[$sunday->toDateString()]['F'] = 0;
            foreach ($attendances as $attendance) {
                if ($attendance->gender == 'M') {
                    $summary[$sunday->toDateString()]['M']++;
                } else if ($attendance->gender == 'F') {
                    $summary[$sunday->toDateString()]['F']++;
                }
            }
            $sunday->subDay(7);
        }
        return $summary;
    }
}
