<?php

use App\Http\Controllers\Admin\Main\IndexController;
use App\Http\Controllers\CommentController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

$tags = 'design, fashion, travel, music, party, video, photography, adventure';


//     POST ROUTES
Route::group(['namespace' => 'App\Http\Controllers\Post'],function (){
    //Show all posts page
    Route::get('/', 'IndexController')->name('post.index');
    //Show one post page
    Route::get('/post/{post}', 'ShowController');

//    //Delete the post
    Route::delete('/posts/{post}','DestroyController')->middleware('editor');
//    //Create new post page
    Route::get('/create', 'CreateController')->middleware('editor',);
//    //Store data from new post
    Route::post('/posts','StoreController')->middleware('editor');
//    //Update the post page
    Route::get('/posts/{post}/update','EditController')->middleware('editor');
//    //Update the post data
    Route::put('/posts/{post}','UpdateController')->middleware(['auth', 'editor']);
});


//     USER ROUTES
Route::controller(UserController::class)->group(function (){
    //Register new user page
    Route::get('/register','register');
    //Store new user data
    Route::post('/users', 'store');
    //User logout
    Route::post('/logout','logout')->middleware('auth');
    //User login
    Route::get('/login', 'login')->name('login');
    //User authenticate
    Route::post('/authenticate', 'authenticate');
    //User manage system
    Route::get('/user/manage', 'manage')->middleware('auth');
    //Liked posts
    Route::get('/user/liked-posts', 'likedPosts')->middleware('auth');
    //Update user Role
    Route::patch('/user/update-role', 'updateRole');
});


//LIKES ROUTES
Route::controller(LikeController::class)->group(function (){
//    like
    Route::post('/likes', 'like')->middleware('auth');
//    unlike
    Route::post('/unlike', 'unlike')->middleware('auth');
});


//COMMENT ROUTES
Route::controller(CommentController::class)->group(function (){
//    Store comment
    Route::post('/store-comment', 'store')->middleware('auth');
//    Delete comment
    Route::delete('/delete-comment', 'destroy')->middleware('auth');

});


//Admin ROUTES
Route::group(['prefix'=>'admin', 'middleware'=>'admin'], function (){
    Route::controller(IndexController::class)->group( function (){
//         Home
        Route::get('/','index');
//        All posts
        Route::get('/all-posts', 'posts');
//        All authors
        Route::get('/all-authors',  'authors');
    });
});


// OTHER PAGES

//About page
Route::get('/about', function (){
    return view('about', [
        'authors' => User::all(),
        'posts' => Post::latest()->limit(3)->get(),
        'posts_count' => Post::all()->count(),
    ]);
});

