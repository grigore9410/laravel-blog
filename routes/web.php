<?php
use Illuminate\Http\Request;

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
//
Route::get('/', 'Controller@homepage' );

Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

//pasword reset routes
//
//
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);
Route::get('about',  'PagesController@getAbout');
Route::get('contact', 'PagesController@getContact');
Route::post('contact', 'PagesController@postContact');
Route::get('/', 'PagesController@getIndex');
Route::resource('posts' , 'PostController');
Route::get('contact', ['uses' => 'PagesController@getContact', 'as' => 'home']);

//Categories
Route::resource('categories', 'CategoryController', ['except' => ['create']]);
Route::resource('tags', 'TagController', ['except' => ['create']]);

//Comments
Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' =>'comments.store']);
Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' =>'comments.edit']);
Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' =>'comments.update']);
Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' =>'comments.destroy']);
Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' =>'comments.delete']);





//Route::get('/', function () {
//    $links = \App\Link::all();
//    return view('welcome', ['links' => $links]);
//});


//Route::get('/submit', function () {
//    return view('submit');
//})
//Route::post('/submit', function(Request $request) {
//    $validator = Validator::make($request->all(), [
//        'title' => 'required|max:255',
//        'url' => 'required|max:255',
//        'description' => 'required|max:255',
//    ]);
//    if ($validator->fails()) {
//        return back()
//            ->withInput()
//            ->withErrors($validator);
//    }
//    $link = new \App\Link;
//    $link->title = $request->title;
//    $link->url = $request->url;
//    $link->description = $request->description;
//    $link->save();
//    return redirect('/');
//});