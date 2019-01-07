<?php

namespace Tests\Unit;

use App\Member;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
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

        $member = new Member();

        $this->assertEquals(1,  $member->getActiveMember()->count());
    }
}
