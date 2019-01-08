<?php

namespace Tests\Unit;

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
            'bod' => Carbon::now(),
        ]);

        factory(Member::class)->create([
            'bod' => Carbon::parse('last month')->toDateString(),
        ]);

        $this->assertEquals(1, (new Member())->birthdayThisWeek()->count());
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
}
