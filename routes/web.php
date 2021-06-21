<?php
use Illuminate\Support\Facades\DB;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

    Route::resource('admin', 'AdminController');
    Route::get('profile/index', 'ProfileController@index')->name('users.profiles');

    Route::get('category/create', "CategoryController@create")->name('category.create');
    Route::post('category/store', "CategoryController@store")->name('category.store');

    Route::get('subcategory/create', "SubCategoryController@create")->name('subcategory.create');
    Route::post('subcategory/store', "SubCategoryController@store")->name('subcategory.store');

    Route::get('childcategory/create', "ChildCategoryController@create")->name('childcategory.create');
    Route::post('childcategory/store', "ChildCategoryController@store")->name('childcategory.store');

    // Route::post('profile/store', 'ProfileController@store')->name('profile.store'); // repeated to times
    Route::get('profile/create', 'ProfileController@create')->name('profile.create');

    Route::get('profile/show/{user:slug}', 'ProfileController@show')->name('profile.show');
    Route::get('profile/{user:slug}/edit', 'ProfileController@edit')->name('profile.edit')->middleware('can:edit,user');
    Route::post('profile/{user:slug}/store', 'ProfileController@store')->name('profile.store');
    Route::put('profile/{user:username}/update', 'ProfileController@update')->name('profile.update');

    Route::post('profile/{user:username}/follow', 'FollowController@store');

    Route::get('post/index', 'PostController@index')->name('post.index');
    Route::get('post/create', 'PostController@create')->name('post.create');
    Route::post('post/store', 'PostController@store')->name('post.store');
    Route::get('post/{post:slug}/show', 'PostController@show')->name('post.show');

    Route::get('explore','ExploreController@index')->name('explore.index');

    Route::post('post/{post}/like', 'PostLikeController@store');
    Route::delete('post/{post}/dislike', 'PostLikeController@destroy');

    Route::post('comment/{comment}/like', 'CommentLikeController@store');
    Route::delete('comment/{comment}/dislike', 'CommentLikeController@destroy');

    Route::post('/comment/store', 'CommentController@store')->name('comment.store');
    Route::post('/reply/store', 'ReplyController@store')->name('reply.store');

});
