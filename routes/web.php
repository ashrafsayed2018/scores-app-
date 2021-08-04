<?php

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

// DB::listen(function($query) {
//     var_dump($query->sql);
// });

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function () {
    $new = new Carbon('first day of feb');
    dd($new);
});

Route::get('/', function () {
    return view('index');
});

Auth::routes();


Route::middleware(['auth'])->group(function () {

    Route::get('category/create', "CategoryController@create")->name('category.create');
    Route::post('category/store', "CategoryController@store")->name('category.store');

    Route::get('subcategory/create', "SubCategoryController@create")->name('subcategory.create');
    Route::post('subcategory/store', "SubCategoryController@store")->name('subcategory.store');

    Route::get('childcategory/create', "ChildCategoryController@create")->name('childcategory.create');
    Route::post('childcategory/store', "ChildCategoryController@store")->name('childcategory.store');


    Route::get('profile/create', 'ProfileController@create')->name('profile.create');
    Route::get('profile/show/{profile:slug}', 'ProfileController@show')->name('profile.show');
    Route::get('profile/{profile:slug}/edit', 'ProfileController@edit')->name('profile.edit');
    Route::post('profile/{profile:slug}/store', 'ProfileController@store')->name('profile.store');
    Route::PATCH('profile/{profile:name}/update', 'ProfileController@update')->name('profile.update');

    Route::get('post', 'PostController@index')->name('post.index');
    Route::get('post/create', 'PostController@create')->name('post.create');
    Route::post('post/store', 'PostController@store')->name('post.store');
    Route::get('/myposts', 'PostController@view_user_posts')->name('myposts');


    Route::post('/comment/store', 'CommentController@store')->name('comment.store');
    Route::post('/reply/store', 'ReplyController@store')->name('reply.store');
    Route::get('/notifications', 'UserNotificationController@show')->name('notifications.show');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('explore', 'ExploreController@index')->name('explore.index');
Route::get('post/{post:slug}/show', 'PostController@show')->name('post.show');
Route::get('category/{category:slug}/show', "CategoryController@show")->name('category.show');
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('login/google/callback', 'Auth\GoogleController@handleGoogleCallback');

Route::resource('/finger', 'FingerController')->name('', 'finger.store');
Route::get('/preferences', 'PrefrencesController@show')->name('prefrences.show');

Route::get('/terms', 'HomeController@terms')->name('terms');
Route::get('/privacy', 'HomeController@privacy')->name('privacy');


Route::group(['middleware' => ['role:admin']], function () {

    Route::get('admin/users', 'Admin\DashboardController@users')->name('admin.users');
    Route::get('admin/posts', 'Admin\DashboardController@posts')->name('admin.posts');

    Route::resource('admin/dashboard', 'Admin\DashboardController');
});
