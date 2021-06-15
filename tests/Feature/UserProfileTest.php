<?php

namespace Tests\Feature;

use App\User;
use App\Profile;
use Tests\TestCase;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserProfileTest extends TestCase
{

    use RefreshDatabase;
     /** @test */
     public function only_authanticated_user_can_show_all_profiles()
     {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/profile/index');

        $response->assertOk();
     }
    /** @test */
    public function only_authanticated_user_can_view_create_a_profile()
    {


        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/profile/create');


        $response->assertStatus(200);


    }

    /** @test */

    public function only_authanticated_user_can_store_a_profile () {

        // $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->post(route('profile.store', $user->slug), [
            'username' => 'ashraf',
            'about'    => 'this is me ashraf',
            'image'    => 'image.jpg',
            'age'      => 23,
            'gender'   => 'male'
        ]);


        $this->assertCount(1,Profile::all());
    }

   /** @test */

   public function username_is_required_when_new_profile_created() {
    $user = factory(User::class)->create();

    $response = $this->actingAs($user)->post(route('profile.store', $user->slug), [
        'username' => '',
        'about'    => 'this is me ashraf',
        'image'    => 'image.jpg',
        'age'      => 23,
        'gender'   => 'male'
    ]);

    $response->assertSessionHasErrors('username');
   }

      /** @test */

      public function about_is_required_when_new_profile_created() {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->post(route('profile.store', $user->slug), [
            'username' => 'ashraf',
            'about'    => '',
            'image'    => 'image.jpg',
            'age'      => 23,
            'gender'   => 'male'
        ]);

        $response->assertSessionHasErrors('about');
       }
    /** @test */

   public function image_is_required_when_new_profile_created() {
    $user = factory(User::class)->create();

    $response = $this->actingAs($user)->post(route('profile.store', $user->slug), [
        'username' => 'ashraf',
        'about'    => 'this is me ashraf',
        'image'    => '',
        'age'      => 23,
        'gender'   => 'male'
    ]);

    $response->assertSessionHasErrors('image');
   }
      /** @test */

    public function age_is_required_when_new_profile_created() {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->post(route('profile.store', $user->slug), [
            'username' => 'ashraf',
            'about'    => 'this is me ashraf',
            'image'    => 'image.jpg',
            'age'      => '',
            'gender'   => 'male'
        ]);

        $response->assertSessionHasErrors('age');
    }
          /** @test */

     public function gender_is_required_when_new_profile_created() {
            $user = factory(User::class)->create();

            $response = $this->actingAs($user)->post(route('profile.store', $user->slug), [
                'username' => 'ashraf',
                'about'    => 'this is me ashraf',
                'image'    => 'image.jpg',
                'age'      => '23',
                'gender'   => ''
            ]);

            $response->assertSessionHasErrors('gender');
        }

    /** @test */

    public function only_authanticated_user_can_view_update_profile() {
             $this->withoutExceptionHandling();

            $user = factory(User::class)->create();

            $response = $this->actingAs($user)->post(route('profile.store', $user->slug), [
                'username' => 'ashraf sayed',
                'about'    => 'this is me ashraf',
                'image'    => 'image.jpg',
                'age'      =>  23,
                'gender'   => 'male'
            ]);


            $profile = Profile::latest()->first();

            $slug = Str::slug($profile->username);

            $response = $this->actingAs($user)->get(route('profile.edit', $slug));

            $response->assertOk();


    }

    /** @test */

    public function only_authanticated_user_can_update_his_own_profile() {

        //  $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $this->actingAs($user)->post(route('profile.store', $user->slug), [
            'username' => 'ashraf',
            'about'    => 'this is me ashraf',
            'image'    => 'image.jpg',
            'age'      => 23,
            'gender'   => 'male'
        ]);

        $profile = Profile::first();

        $response = $this->actingAs($user)->put(route('profile.update', $profile->user_id), [
            'username' => 'ashraf',
            'about'    => 'this is me ashraf',
            'image'    => 'image.jpg',
            'age'      => 23,
            'gender'   => 'male'
        ]);


        $this->assertCount(1,Profile::all());
    }
}
