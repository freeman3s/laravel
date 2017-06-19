<?php
// dd(resolve('App\Billing\Stripe'));

Route::get('/about', function () {
	return view('about');
});
Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');

Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');

Route::get('/posts/tags/{tag}', 'TagsController@index');

Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
	Route::get('/posts', [
		'as'   => 'admin-posts',
        'uses' => 'Admin\PostsController@index',
	]);
	Route::get('/posts/create', [
        'as'   => 'admin-posts-create',
        'uses' => 'PostsController@create',
    ]);
    Route::get('/posts/{post}/edit', [
		'as'   => 'admin-posts-edit',
        'uses' => 'Admin\PostsController@edit',
	]);
	Route::post('/posts/{post}/store', [
		'as'   => 'admin-posts-store',
        'uses' => 'Admin\PostsController@store',
	]);
	Route::get('/posts/{post}/delete', [
		'as'   => 'admin-posts-delete',
        'uses' => 'Admin\PostsController@delete',
	]);
});