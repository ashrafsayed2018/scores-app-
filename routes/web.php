<?php

use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

// DB::listen(function($query) {
//     var_dump($query->sql);
// });

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('home');
});

Auth::routes(['verify' => true]);


Route::middleware(['auth'])->group(function () {

    Route::get('category/create', "CategoryController@create")->name('category.create');
    Route::post('category/store', "CategoryController@store")->name('category.store');


    Route::get('subcategory/create', "SubCategoryController@create")->name('subcategory.create');
    Route::post('subcategory/store', "SubCategoryController@store")->name('subcategory.store');
    Route::get('subcategory/show/{subcategory:slug}', "SubCategoryController@show")->name('subcategory.show');


    Route::get('childcategory/create', "ChildCategoryController@create")->name('childcategory.create');
    Route::post('childcategory/store', "ChildCategoryController@store")->name('childcategory.store');
    Route::get('childcategory/show/{childcategory:slug}', "ChildCategoryController@show")->name('childcategory.show');


    Route::get('profile/create', 'ProfileController@create')->name('profile.create');
    Route::get('profile/show/{profile:slug}', 'ProfileController@show')->name('profile.show');
    Route::get('profile/{profile:slug}/edit', 'ProfileController@edit')->name('profile.edit');
    Route::post('profile/{profile:slug}/store', 'ProfileController@store')->name('profile.store');
    Route::PATCH('profile/{profile:name}/update', 'ProfileController@update')->name('profile.update');


    Route::get('post/create', 'PostController@create')->name('post.create');
    Route::post('post/store', 'PostController@store')->name('post.store');
    Route::delete('post/destroy/{id}', 'PostController@destroy')->name('post.destroy');
    Route::get('/posts/{userId}/show', 'PostController@view_user_posts')->name('show_user_posts');


    Route::post('/comment/store', 'CommentController@store')->name('comment.store');
    Route::post('/reply/store', 'ReplyController@store')->name('reply.store');
    Route::get('/notifications', 'UserNotificationController@show')->name('notifications.show');
    Route::get('user/dashboard/{user:slug}', 'User\DashboardController@user')->name('dashoboard.user');
    // message
    Route::get('/messages', "SendMessageController@index")->name('messages');
    Route::post('/send/message', "SendMessageController@store");
    Route::get('/message/users', "SendMessageController@chatWithThatUser");
    Route::get('/message/user/{id}', 'SendMessageController@showMessages');
    Route::post('/start-conversation', 'SendMessageController@startConversation');
});

Route::get('post', 'PostController@index')->name('post.index');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('explore', 'ExploreController@index')->name('explore.index');
Route::get('post/{id}/{post:slug}/show', 'PostController@show')->name('post.show');
Route::get('category/{category:slug}/show', "CategoryController@show")->name('category.show');
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('login/google/callback', 'Auth\GoogleController@handleGoogleCallback');

Route::resource('/finger', 'FingerController')->name('', 'finger.store');
Route::get('/preferences', 'PrefrencesController@show')->name('prefrences.show');

Route::get('/terms', 'HomeController@terms')->name('terms');
Route::get('/privacy', 'HomeController@privacy')->name('privacy');


Route::group(['middleware' => ['role:Admin']], function () {

    Route::get('admin/users', 'Admin\DashboardController@users')->name('admin.users');

    Route::get('admin/posts', 'Admin\DashboardController@posts')->name('admin.posts');

    Route::resource('admin/dashboard', 'Admin\DashboardController');
});
