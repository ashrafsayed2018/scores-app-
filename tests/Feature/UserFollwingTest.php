<?php

namespace Tests\Feature;

use App\User;
use App\Follow;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserFollwingTest extends TestCase
{

    use RefreshDatabase;
    /**  @test */
    public function authanticated_user_can_follow_another_users()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $user2 = factory(User::class)->create();

        $this->actingAs($user->follow($user2));

        $this->assertCount(1,$user->follows);

    }
}
