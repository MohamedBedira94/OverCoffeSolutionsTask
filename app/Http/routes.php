<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	return view('welcome');
});


Route::get('/home', 'HomeController@index');

Route::get('auth/facebook', 'AuthSocController@redirectToProvider');
Route::get('auth/facebook/callback', 'AuthSocController@handleProviderCallback');

Route::auth();


Route::group(['middleware' => ['auth']], function() {





	Route::resource('users','UserController');
	Route::resource('posts','PostController');
	Route::resource('categories','CategoryController');


	Route::get('users',['as'=>'users.index','uses'=>'UserController@index','middleware' => ['permission:user-list|user-create|user-edit|user-delete']]);
	Route::get('users/create',['as'=>'users.create','uses'=>'UserController@create','middleware' => ['permission:user-create']]);
	Route::post('users/create',['as'=>'users.store','uses'=>'UserController@store','middleware' => ['permission:user-create']]);
	Route::get('users/{id}',['as'=>'users.show','uses'=>'UserController@show']);
	Route::get('users/{id}/edit',['as'=>'users.edit','uses'=>'UserController@edit','middleware' => ['permission:user-edit']]);
	Route::patch('users/{id}',['as'=>'users.update','uses'=>'UserController@update','middleware' => ['permission:user-edit']]);
	Route::delete('users/{id}',['as'=>'users.destroy','uses'=>'UserController@destroy','middleware' => ['permission:user-delete']]);


	Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
	Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
	Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
	Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
	Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
	Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
	Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);

	Route::get('posts',['as'=>'posts.index','uses'=>'PostController@index','middleware' => ['permission:post-list|post-create|post-edit|post-delete']]);
	Route::get('posts/create',['as'=>'posts.create','uses'=>'PostController@create','middleware' => ['permission:post-create']]);
	Route::post('posts/create',['as'=>'posts.store','uses'=>'PostController@store','middleware' => ['permission:post-create']]);
	Route::get('posts/{id}',['as'=>'posts.show','uses'=>'PostController@show']);
	Route::get('posts/{id}/edit',['as'=>'posts.edit','uses'=>'PostController@edit','middleware' => ['permission:post-edit']]);
	Route::patch('posts/{id}',['as'=>'posts.update','uses'=>'PostController@update','middleware' => ['permission:post-edit']]);
	Route::delete('posts/{id}',['as'=>'posts.destroy','uses'=>'PostController@destroy','middleware' => ['permission:post-delete']]);

	Route::get('categories',['as'=>'categories.index','uses'=>'CategoryController@index','middleware' => ['permission:category-list|category-create|category-edit|category-delete']]);
	Route::get('categories/create',['as'=>'categories.create','uses'=>'CategoryController@create','middleware' => ['permission:category-create']]);
	Route::post('categories/create',['as'=>'categories.store','uses'=>'CategoryController@store','middleware' => ['permission:category-create']]);
	Route::get('categories/{id}',['as'=>'categories.show','uses'=>'CategoryController@show']);
	Route::get('categories/{id}/edit',['as'=>'categories.edit','uses'=>'CategoryController@edit','middleware' => ['permission:category-edit']]);
	Route::patch('categories/{id}',['as'=>'categories.update','uses'=>'CategoryController@update','middleware' => ['permission:category-edit']]);
	Route::delete('categories/{id}',['as'=>'categories.destroy','uses'=>'CategoryController@destroy','middleware' => ['permission:category-delete']]);


});
