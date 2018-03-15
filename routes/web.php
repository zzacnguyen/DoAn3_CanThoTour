<?php

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

Route::resource('eating', 'EatingController');
//thay thế
Route::resource('anuong', 'anuongController');

//Bỏ
Route::resource('binhluan', 'binhluanController');

//Chưa sử dụng
Route::resource('chitietlichtrinh', 'chitietlichtrinhController');

Route::resource('visitor-ratings', 'VisitorRatingController');
//thay thế
Route::resource('danhgia', 'danhgiaController');

Route::resource('service','ServicesController');
//thay thế
Route::resource('usersearch', 'userSearch');

Route::resource('hotels', 'vnt_hotelsController');
Route::resource('khachsan', 'khachsanController');

Route::resource('lichtrinh', 'lichtrinhController');


Route::post('add-places', 'tourist_places_controller@AddPlace');
Route::post('add-services/{id}','tourist_places_controller@AddServices');
Route::get('get-name-services/{id}', 'tourist_places_controller@GetNamePlace');
Route::resource('tourist-places', 'tourist_places_Controller');
Route::resource('diadiem', 'diadiemController');

Route::resource('loaihinhsukien', 'loaihinhsukienController');

Route::resource('nguoidung', 'nguoidungController');

Route::resource('transport', 'transportController');
//thay thế
Route::resource('phuongtien', 'phuongtienController');

Route::resource('events', 'EventsController');
Route::resource('sukien', 'sukienController');



Route::resource('sightseeing', 'sightseeingController');
//thay thế
Route::resource('thamquan', 'thamquanController');

Route::resource('entertainments', 'vnt_entertainmentsController');
Route::resource('vuichoi', 'vuichoiController');

Route::resource('tukhoa', 'tukhoaController');

Route::resource('tukhoa_dichvu', 'tukhoa_dichvu_Controller');

Route::resource('like', 'LikeController');
//thay thế
Route::resource('yeuthich', 'yeuthichController');


// TIM KIEM
// tìm kiếm địa điểm lân cận giới hạn 10 địa điểm
Route::get('timkiem/diadiemlancan/location={latitude},{longitude}&radius={radius}','timkiemController@search_lancan');

Route::get('timkiem/dichvulancan/location={latitude},{longtitude}&type={type}&radius={radius}','timkiemController@search_dichvu_lancan');
Route::get('timkiem/dichvu/id={iddiadiem}','timkiemController@get_dichvu');

Route::get('timkiem/dichvuall/keyword={keyword}','timkiemController@search_dichvu_all');

Route::get('timkiem/dichvunangcao/idtype={type}&keyword={keyword}','timkiemController@search_dichvu_type');

// search new
Route::get('search/placevicinity/location={latitude},{longitude}&radius={radius}','SearchController@searchPlaceVicinity');

Route::get('search/servicevicinity/location={latitude},{longtitude}&type={type}&radius={radius}','SearchController@searchServicesVicinity');

Route::get('search/services/keyword={keyword}','SearchController@searchServicesKeyword');

// LOGIN-LOGOUT-REGISTER
Route::post('login','loginController@postLogin')->name('loginW');
Route::post('register','loginController@register');
Route::get('logout','loginController@logout');
// web
Route::post('loginW','loginController@postLoginW');
Route::get('registerW','pageController@getregister');

Route::get('logoutW','loginController@logoutW')->name('logoutW');



Route::get('test', 'timkiemController@test');
Route::post('upload-image/{id}','ImagesController@Upload');
Route::get('get-icon/{id}', 'ImagesController@getIcon');
Route::get('get-banner/{id}', 'ImagesController@getBanner');
Route::get('get-thumb-1/{id}', 'ImagesController@getThumbnail1');
Route::get('get-thumb-2/{id}', 'ImagesController@getThumbnail2');
Route::get('get-detail-1/{id}', 'ImagesController@getImageDetail1');
Route::get('get-detail-2/{id}', 'ImagesController@getImageDetail2');
Route::get('get-only-icon-image', 'ImagesController@GetOnlyIconImage');
Route::get('rating-service/{id}','Rating_Service_Controller@rating');
//thay-the
Route::get('danhgia-dichvu/{id}','danhgia_dichvu_controller@danhgia');
Route::get('google-maps','testGoogleMapsApi@FunctionName');


// 
Route::get('index','pageController@getindex');

// login view
Route::get('login','pageController@getlogin');