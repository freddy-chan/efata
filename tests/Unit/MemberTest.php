<?php

namespace Tests\Unit;

use App\User;
use App\Member;
use Carbon\Carbon;
use App\Attendance;
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

    public function testCreateNewMember()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                    ->post(route('member.store'), [
                        'first_name' => 'John',
                        'middle_name' => 'Kelvin',
                        'last_name' => 'Doe',
                        'nickname' => 'Joel',
                        'email' => 'joel@gmail.com',
                        'bod' => '1990/12/14',
                        'birth_place' => 'Tampa',
                        'gender' => 'M',
                        'marital_status' => 'single',
                        'address' => '121 Baker St',
                        'address2' => null,
                        'city' => 'Tampa',
                        'state' => 'Florida',
                        'country' => 'United States',
                        'zip_code' => '33612',
                        'phone' => '+181312345678',
                        'home_phone' => null
                    ]);

        $member = Member::where('first_name', 'John')->first();

        $this->assertEquals('John', $member->first_name);
        $this->assertEquals('active', $member->status);
        $this->assertEquals(null, $member->address2);
        $response->assertStatus(302);
        $response->assertLocation(route('member'));
    }

    public function testUpdateMember()
    {
        $user = factory(User::class)->create();

        $member = factory(Member::class)->create();

        $response = $this->actingAs($user)
            ->put(route('member.update', [$member]), [
                'first_name' => 'Kevin',
                'last_name' => 'Robert',
                'gender' => 'M',
                'marital_status' => 'single',
            ]);
        $member = Member::where('first_name', 'Kevin')->first();

        $this->assertEquals('Kevin', $member->first_name);
        $this->assertEquals('Robert', $member->last_name);
        $response->assertStatus(302);
        $response->assertLocation(route('member'));
    }

    public function testDeleteMember()
    {
        $user = factory(User::class)->create();

        $member = factory(Member::class)->create();

        $this->actingAs($user)
            ->delete(route('member.delete', [$member]));

        $this->assertEquals(null, Member::find($member->id));
    }

    public function testChangeStatus()
    {
        $user = factory(User::class)->create();

        $member = factory(Member::class)->create();

        $this->actingAs($user)
            ->post(route('member.changeStatus', [$member]), [
                'status' => 'inactive',
            ]);

        $this->assertEquals('inactive', Member::find($member->id)->status);
    }
}
