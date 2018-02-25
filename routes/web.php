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
Route::resource('dichvu', 'dichvuController');

Route::resource('khachsan', 'khachsanController');

Route::resource('lichtrinh', 'lichtrinhController');

Route::resource('diadiem', 'diadiemController');

Route::resource('loaihinhsukien', 'loaihinhsukienController');

Route::resource('nguoidung', 'nguoidungController');

Route::resource('transport', 'transportController');
Route::resource('phuongtien', 'phuongtienController');

Route::resource('events', 'EventsController');
Route::resource('sukien', 'sukienController');



Route::resource('sightseeing', 'sightseeingController');
//thay thế
Route::resource('thamquan', 'thamquanController');


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

// LOGIN-LOGOUT-REGISTER
Route::post('login','dangnhapController@postLogin');
Route::get('logout','dangnhapController@logout_api')->middleware('auth:api');
Route::post('dangky','dangnhapController@dangky');




Route::get('test', 'timkiemController@test');
Route::post('upload-image','ImagesController@Upload');
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