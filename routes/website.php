<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('index','pageController@getindex')->name('index');

Route::get('registerW','pageController@getregister')->name('registerW');
Route::get('logoutW','loginController@logoutW')->name('logoutW');
Route::get('loginW','pageController@getlogin')->name('loginW');

Route::post('loginpost','loginController@postLoginW')->name('loginpost');

?>