<?php
Route::get('/',function(){
	return view('home');
});
Route::get('/home','SessionsController@homePage');

Route::get('/posts/create','PostsController@create');
Route::post('/posts','PostsController@store');
Route::post('/posts/{post}/like','LikesController@store');
Route::post('/posts/{post}/dislike','LikesController@destroy');
Route::get('/posts/{post}','PostsController@show');
Route::post('/posts/{post}/comments','CommentsController@store');
Route::resource('posts','PostsController');

Route::get('/register','RegistrationController@create');
Route::post('/register','RegistrationController@store');
Route::get('/login','SessionsController@create');
Route::post('/login','SessionsController@store');
Route::get('/profile','UsersController@create');
Route::post('/profile','UsersController@update_avatar');

Route::get('/search','SearchController@create');
Route::post('/search','SearchController@visit');
Route::get('/profile/{user}','UsersController@show');
Route::post('/follow/{user}','FollowersController@store');
Route::post('/unfollow/{user}','FollowersController@delete');
Route::get('/followers/{user}','FollowersController@findFollowers');
Route::get('/following/{user}','FollowersController@findFollowing');
Route::get('/timeline','UsersController@createTimeline');
Route::resource('tags','TagsController',['except' => ['create']]);
Route::get('tags/show','TagsController@get');
Route::get('/users/edit','UsersController@edit');
Route::put('/users/update','UsersController@update');
Route::resource('users','UsersController',['except' => ['create']]);

Route::get('/logout','SessionsController@destroy');
Route::get('register/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'RegistrationController@confirm'
]);