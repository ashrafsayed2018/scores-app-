<?php

namespace Tests\Feature;

use App\SubCategory;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubcategoryTest extends TestCase
{
    use RefreshDatabase;
    /**
    @test
     */
    public function authanticated_user_view_create_subcategory_page()
    {

        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('subcategory/create');

        $response->assertStatus(200);
    }

       /**
    @test
     */
    public function authanticated_user_view_store_subcategory()
    {

        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $sub = factory(SubCategory::class)->create();

        // $response = $this->actingAs($user)->post('subcategory/store', [
        //     'name' => 'new cat',
        //     'image' => '123.jpg',
        //     'category_id' => 2
        // ]);


    //     dd($response);
     $this->assertCount(1 , SubCategory::all());

        // $this->assertDatabaseHas('sub_categories',['category_id','name','image']);

        // $this->assertCount(1, SubCategory::all());

    }

    /** @test */

    public function subcategory_name_is_required()
    {

        // $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->post(route('subcategory.store'),[
            'name' => '',

        ]);

         $response->assertSessionHasErrors('name');

    }


    /** @test */

    public function subcategory_image_is_required()
    {

        // $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->post(route('subcategory.store'),[
            'image' => '',

        ]);

         $response->assertSessionHasErrors('image');

    }

        /** @test */

        public function subcategory_category_id_is_required()
        {

            // $this->withoutExceptionHandling();
            $user = factory(User::class)->create();

            $response = $this->actingAs($user)->post(route('subcategory.store'),[
                'category_id' => '',

            ]);

             $response->assertSessionHasErrors('category_id');

        }
}
