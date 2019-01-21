<?php

namespace Tests\Unit;

use App\Attendance;
use Carbon\Carbon;
use App\Member;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MemberTest extends TestCase
{
    use RefreshDatabase;

    public function testMemberActive()
    {
        factory(Member::class)->create([
            'status' => 'active',
        ]);

        factory(Member::class)->create([
            'status' => 'inactive',
        ]);

        factory(Member::class)->create([
            'status' => 'inactive',
        ]);

        $this->assertEquals(1,  (new Member)->active()->count());
    }

    public function testMemberBirthdayWeekly()
    {
        factory(Member::class)->create([
            'bod' => Carbon::parse('10 years ago')->toDateString(),
        ]);

        factory(Member::class)->create([
            'bod' => Carbon::parse('last month')->toDateString(),
        ]);

        $this->assertEquals(1, (new Member())->birthdayThisMonth()->birthdayThisWeek()->count());
    }

    public function testMemberBirthdayMonthly()
    {
        factory(Member::class)->create([
            'bod' => Carbon::now(),
        ]);

        factory(Member::class)->create([
            'bod' => Carbon::parse('last month')->toDateString(),
        ]);

        $this->assertEquals(1, (new Member())->birthdayThisMonth()->count());
    }

    public function testMemberBirthdayTomorrow()
    {
        factory(Member::class)->create([
            'bod' => Carbon::now(),
        ]);

        factory(Member::class)->create([
            'bod' => Carbon::create(1900, Carbon::now()->month, Carbon::now()->addDay()->day)->toDateString(),
        ]);

        $this->assertEquals(1, (new Member())->birthdayThisMonth()->birthdayTomorrow()->count());
    }

    public function testAttendance()
    {
        $member = factory(Member::class)->create([
            'bod' => Carbon::now(),
            'status' => 'active',
        ]);

        factory(Attendance::class)->create([
            'member_id' => $member->id,
            'date' => Carbon::now(),
        ]);

        $member = Member::find($member->id);
        $attendance = $member->attendOnDate(Carbon::now()->toDateString())->get();

        self::assertEquals($member->first_name, $attendance[0]->first_name);
    }
}
