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


Route::resource('anuong', 'anuongController');
Route::resource('binhluan', 'binhluanController');
Route::resource('chitietlichtrinh', 'chitietlichtrinhController');
Route::resource('danhgia', 'danhgiaController');
Route::resource('dichvu', 'dichvuController');
Route::resource('khachsan', 'khachsanController');
Route::resource('lichtrinh', 'lichtrinhController');
Route::resource('diadiem', 'diadiemController');
Route::resource('loaihinhsukien', 'loaihinhsukienController');
Route::resource('nguoidung', 'nguoidungController');
Route::resource('phuongtien', 'phuongtienController');
Route::resource('sukien', 'sukienController');
Route::resource('thamquan', 'thamquanController');
Route::resource('vuichoi', 'vuichoiController');
Route::resource('tukhoa', 'tukhoaController');
Route::resource('tukhoa_dichvu', 'tukhoa_dichvu_Controller');
Route::resource('yeuthich', 'yeuthichController');



// Route::get('timkiem/type={type}&keyword={key}','timkiemController@search_type_keyword');

Route::get('timkiemSort/location={latiitude},{longitude}&radius={radius}&keyword={key}','timkiemController@searchLocationByRadiusAndKeyword');

// Route::get('timkiem/keyword={key}','timkiemController@search_keyword_location');

Route::get('timkiem/type={type}&keyword={keyword}','timkiemController@search');

Route::get('timkiem/keyword={keyword}','timkiemController@search_all');

Route::get('timkiemlancan/location={latiitude},{longitude}&radius={radius}','timkiemController@search_lancan');
// 


Route::get('test', 'timkiemController@test');

Route::get('get-only-icon-image', 'hinhanhController@GetOnlyIconImage');

Route::get('test', 'timkiemController@test');


Route::post('upload-image','hinhanhController@Upload');
Route::get('lay-mot-hinh-icon/{id}', 'hinhanhController@LayMotIcon');
Route::get('lay-mot-hinh-thumb/{id}', 'hinhanhController@LayMotThumb');
Route::get('lay-mot-hinh-chi-tiet-1/{id}', 'hinhanhController@LayMotHinhChiTiet1');
Route::get('lay-mot-hinh-chi-tiet-2/{id}', 'hinhanhController@LayMotHinhChiTiet2');


//GET ID
Route::get('lay-id-dia-diem', 'GetIDController@LayIDiaDiem');
Route::get('lay-id-su-kien', 'GetIDController@LayIDSuKien');
Route::get('lay-id-dich-vu', 'GetIDController@LayIDDichVu');
Route::get('lay-id-yeu-thich', 'GetIDController@LayIDYeuThich');
Route::get('lay-id-an-uong', 'GetIDController@LayIDAnUong');
Route::get('lay-id-binh-luan', 'GetIDController@LayIDBinhLuan');
Route::get('lay-id-tham-quan', 'GetIDController@LayIDThamQuan');
Route::get('lay-id-khach-san', 'GetIDController@LayIDKhachSan');
Route::get('lay-id-vui-choi', 'GetIDController@LayIDVuiChoi');
