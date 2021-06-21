<?php

namespace Tests\Feature;

use App\Like;
use App\Post;
use App\User;
use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LikeTest extends TestCase
{

    use RefreshDatabase;


    /** @test */

    public function a_user_can_like_a_post()
    {
         $this->withoutExceptionHandling();
         $user = factory(User::class)->create();

        $this->be($user);
        $category = factory(Category::class)->create();

        $post = $this->post(route('post.store'), [
            'user_id' => $user->id,
            'title' => 'some title',
            'description' => 'some desc',
            'images' => 'image.jpeg',
            'phone'  => '98787889',
            'category_id' => $category->id
        ]);
         $this->post("/post/1/like");

        $this->assertCount(1, Like::all());
        $this->assertDatabaseHas('likes', [
             'user_id'        => $user->id ,
             'likeable_type' => 'App\Post',
             'likeable_id'   => $category->id,
             'liked'         => 1
            ]);
    }

     /** @test */

     public function a_user_can_dislike_a_post()
     {
          $this->withoutExceptionHandling();
          $user = factory(User::class)->create();

          $this->be($user);
         $category = factory(Category::class)->create();

         $post = $this->post(route('post.store'), [
             'user_id' => $user->id,
             'title' => 'some title',
             'description' => 'some desc',
             'images' => 'image.jpeg',
             'phone'  => '98787889',
             'category_id' => $category->id
         ]);
          $this->delete("/post/1/dislike");

         $this->assertCount(1, Like::all());

         $this->assertDatabaseHas('likes', [
              'user_id'        => 1 ,
              'likeable_type' => 'App\Post',
              'likeable_id'   => 1,
              'liked'         => 0
             ]);
     }
}
