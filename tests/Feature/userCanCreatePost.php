<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class userCanCreatePost extends TestCase
{

    use RefreshDatabase;
    /** @test */
    public function only_logged_in_user_can_create_new_post()
    {
        // $this->withExceptionHandling();
        // $response = $this->get('/post/create');

        $this->assertTrue(false);
    }
}
