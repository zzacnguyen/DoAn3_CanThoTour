<?php




Route::get('/','pageController@getindex')->name('/');

Route::get('registerW','pageController@getregister')->name('registerW');
Route::get('registersuccess','pageController@getregisterSuccess')->name('registersuccess');
Route::get('logoutW','loginController@logoutW')->name('logoutW');
Route::get('loginW','pageController@getlogin')->name('loginW');

Route::post('loginpost','loginController@postLoginW')->name('loginpost');
Route::post('registerWpost','loginController@registerW')->name('registerWpost');
// login facebook
Route::get('login/facebook/redirect', 'loginController@redirectToProvider')->name('loginfacebook');
Route::get('login/facebook/callback', 'loginController@handleProviderCallback');

//user
Route::get('user','pageController@getuser');

// load detail
Route::get('detail/id={id}','pageController@getdetail')->name("detail");
Route::get('detail/s','pageController@getServiceTypeVicinity');

// load addplace
Route::get('addplace','pageController@getaddplace')->name('addplace');
Route::post('addplace', 'pageController@postPlace');
//  load addservice
Route::get('addservice','pageController@getaddservice');

Route::get('city/id={id}','pageController@countplacecity');

Route::get('lam/type={type}','pageController@findservicetocity');

Route::get('d/f={f},g={g}','pageController@getservicestake');

Route::get('lamdv/type={type}','pageController@getlam');


?>