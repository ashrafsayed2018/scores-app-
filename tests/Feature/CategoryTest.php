<?php

namespace Tests\Feature;

use App\Category;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{

    use RefreshDatabase;
    use WithFaker;

     /** @test */
     public function only_authanticated_user_can_view_create_a_category_page() {


        // $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('category.create'));

        $response->assertStatus(200);


     }

    /** @test */
    public function only_authanticated_user_can_create_a_category()
    {

        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();


        $response =  $this->actingAs($user)->post(route('category.store'), [
            'name' => 'newcat',
            'image' => $this->faker->image,
        ]);


        $response->assertStatus(200);

        $this->assertCount(1, Category::all());


    }

       /** @test */
       public function category_name_required()
       {

           // $this->withoutExceptionHandling();
           $user = factory(User::class)->create();


           $this->be($user);

           $response = $this->post('category/store' , [
               'name' => '',
               'image' => 'image.jpg',
           ]);

           $response->assertSessionHasErrors('name');


       }

           /** @test */
           public function category_image_required()
           {

               // $this->withoutExceptionHandling();
               $user = factory(User::class)->create();


               $this->be($user);

               $response = $this->post('category/store' , [
                   'name' => 'cat3',
                   'image' => '',
               ]);

               $response->assertSessionHasErrors('image');


           }
}
