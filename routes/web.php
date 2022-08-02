<?php

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
    return view('welcome');
});

// Route::get('/about', function () {
//     return "About page";
// });

// Route::get('/contact', function () {
//     return "Contact page";
// });

// //route with param
// Route::get('/post/{id}/{name}', function ($id, $name) {
//     return 'Post number ' . $id . " " . $name;
// });

// //assign name for route
// Route::get('admin/posts/example', array(
//     'as' => 'admin.home', function () {
//         $url = route('admin.home');

//         return 'this url is ' . $url;
//     }
// ));


// Route::get('/post/{id}', '\App\Http\Controllers\PostController@index');

// Route::resource('post', '\App\Http\Controllers\PostController');

Route::get('/contact', '\App\Http\Controllers\PostController@contact');

Route::get('post/{id}/{name}/{password}', '\App\Http\Controllers\PostController@show_post');
