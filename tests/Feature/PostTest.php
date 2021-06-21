<?php

namespace Tests\Feature;

use App\User;
use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{

    use RefreshDatabase;


    /** @test
     */


     public function user_can_view_create_post_page() {

        $user = factory(User::class)->create();

        $this->be($user);

        $response = $this->get(route('post.create'));

        $response->assertOk();
     }
    /** @test
     */
    public function user_can_create_new_post()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $this->be($user);

        // $user = factory(User::class)->create();
        $category = factory(Category::class)->create();

        $response = $this->post(route('post.store'), [
            'user_id' => $user->id,
            'title' => 'some title',
            'description' => 'some desc',
            'images' => 'image.jpeg',
            'phone'  => '98787889',
            'category_id' => $category->id
        ]);

        $response->assertOk();


    }
}
