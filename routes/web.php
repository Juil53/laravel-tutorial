<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Models\Post;
use App\Models\User;

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

// Route::get('/contact', '\App\Http\Controllers\PostController@contact');

// Route::get('post/{id}/{name}/{password}', '\App\Http\Controllers\PostController@show_post');


/**
 * DATABASE RAW SQL QUERIES
 */

// Route::get('/insert', function () {
//     DB::insert('insert into posts(title,content) values (?, ?)', 
//     ['PHP with laravel', 'Laravel is the best']);
// });

// Route::get('/read', function () {
//     $results = DB::select('select * from posts where id = ?', [1]);
//     // var_dump($results); //log ra results

//     forEach($results as $result){
//         return $result->title;
//     }

// });


// Route::get('/update', function () {

//     $updated = DB::update('update posts set title = "Update title" where id = ?', [1]);
//     return $updated;

// });

// Route::get('/delete',function(){
//     $deleted = DB::delete('delete from posts where id = ?',[1]);
//     return $deleted;
// });

/*
 * *************************************
 * ELOQUENT ORM
 * *************************************
 */

// Route::get('/read',function(){
//     $posts = Post::all();

//     foreach($posts as $post){
//         return $post->title;
//     }
// });

// Route::get('/find',function(){
//     $post = Post::find(3);
//     return $post->title;
// });

// Route::get('/findwhere', function () {
//     $posts = Post::where('id', 3)->orderBy('id', 'desc')->take(1)->get();
//     return $posts;
// });

// Route::get('/findmore',function(){
//     // $posts = Post::findOrFail(2);
//     // return $posts;

//     $posts = Post::where('users_count','<',50)->firstOrFail();
// });

// Route::get('/basicinsert',function(){
//     //create new post
//     $post = new Post;

//     //add props
//     $post->title = 'new Eloquent title';
//     $post->content = 'Eloquent is coold';

//     //save
//     $post->save();
// });

// Route::get('/basicinsert2',function(){
//     //findpost
//     $post = Post::find(2);

//     //update props
//     $post->title = 'new Eloquent title 2';
//     $post->content = 'Eloquent is cool 2';

//     //save
//     $post->save();
// });

// Route::get('/create', function () {
//     Post::create(['title' => 'the Create method', 'content' => 'I\'m learning PHP']);
// });

// Route::get('/update', function () {
//     Post::where('id', 2)->where('is_admin', 0)->update(['title' => 'New PHP title', 'content' => "New content"]);
// });

// Route::get('/delete',function(){
//     $post = Post::find(2);
//     $post->delete();
// });

// Route::get('/delete2', function () {
//     Post::destroy([3,4,5]); //Delete multi id
//     // Post::where('is_admin',0)->delete(); //Delete with condition
// });

// Route::get('/softdelete',function(){
//     Post::find(2)->delete();
// });

// Route::get('/readsoftdelete',function(){
//     // $post = Post::find(1);
//     // return $post;

//     // Trả về tất cả record
//     $post = Post::withTrashed()->where('is_admin',0)->get();
//     return $post;

//     // Chỉ trả về trashed record
//     // $post = Post::onlyTrashed()->where('is_admin',0)->get();
//     // return $post;
// });

// Route::get('/restore',function(){
//     Post::withTrashed()->where('is_admin',0)->restore();
// });

// Route::get('/forcedelete', function () {
//     Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
// });

/*
 * *************************************
 * ELOQUENT RELATIONSHIP
 * *************************************
 */

//One to One relationship
// Route::get('/user/{id}/post',function($id){
//     return User::find($id)->post;
// });

// Route::get('/post/{id}/user',function($id){
//     return Post::find($id)->user->name;
// });


//One to Many Relationship
// Route::get('/posts',function(){
//     $user = User::find(1);
//     foreach($user->posts as $post){
//         echo $post->title . "<br>";
//     }
// });

//Many to Many relationship
// Route::get('/user/{id}/role', function ($id) {
//     $user = User::find($id)->roles()->orderBy('id','desc')->get();
//     return $user;

//     // foreach ($user->roles as $role) {
//     //     return $role->name;
//     // }
// });

//Accessing the intermediate table (table trung gian)
Route::get('/user/pivot', function () {
    $user = User::find(1);
    echo $user->roles;

    foreach ($user->roles as $role) {
        echo $role->pivot->created_at;
    }
});
