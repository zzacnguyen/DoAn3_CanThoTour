<?php
include 'website.php';
include 'cms.php';
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|	1. Đếm sự kiện
|	
|	
|
|
|
|
|
|
|

| 
|
*/
//sai
Route::get('couter/couter={id}', 'CounterEventsController@Counter');

//đã test get page
Route::resource('eating', 'EatingController');

//đã test
Route::get('type-event', 'typeEvents@getAllEventType');

//đã test get, post
Route::resource('services','ServicesController');

//đã check
Route::get('service/service-id={id_service}&user-id={id_user}', 'ServicesDetailsController@showDetails');

//dang lam
Route::post('edit-services/services-id={id_service}&user-id={id_user}', 'ServicesDetailsController@EditServices');

//chưa code
Route::post('service-postview/id={id}', 'ServicesDetailsController@postCounterView');
 

Route::resource('usersearch', 'userSearch');

//đã check
Route::resource('hotels', 'vnt_hotelsController');

//đã check
Route::post('add-places', 'tourist_places_controller@AddPlace');
//đã check
Route::post('add-services/{id}','tourist_places_controller@AddServices');

//đã check
Route::get('get-name-services/{id}', 'tourist_places_controller@GetNamePlace');

// Route::resource('tourist-places', 'tourist_places_Controller');
Route::resource('transport', 'transportController');

//sự kiện
//đã check
Route::resource('events', 'EventsController');
// Route::get('get-events', 'EventsController@');

//đã check
Route::get('counter-events/{id}', 'CounterEventsController@countEvent'); 

//tham quan
Route::resource('sightseeing', 'sightseeingController');

//đã check
Route::resource('entertainments', 'vnt_entertainmentsController');

//đã check
Route::resource('like', 'LikeController');

//đã check
Route::resource('rating', 'VisitorRatingController');

Route::post('share/service={id}&user={user}', 'ShareController@Share');
// TIM KIEM
// tìm kiếm địa điểm lân cận giới hạn 10 địa điểm
Route::get('point-for-user/{id}', 'PointController@AllPoint');

// search new
Route::get('search/placevicinity/location={latitude},{longitude}&radius={radius}','SearchController@searchPlaceVicinity');

Route::get('search/servicevicinity/location={latitude},{longtitude}&type={type}&radius={radius}','SearchController@searchServicesVicinity');

// Route::get('search-service-vicinity/location={latitude},{longtitude}&type={type}&radius={radius}','SearchController@searchServicesVicinity');

Route::get('search/searchServicesTypeKeyword/type={type}&keyword={keyword}','SearchController@searchServicesTypeKeyword');

Route::get('distanceRadius/location={latitude}&{longitude}&radius={radius}','SearchController@distanceRadius');

// LOGIN-LOGOUT-REGISTER
Route::post('login-mobile','loginController@postLogin')->name('login-mobile');
Route::post('register-mobile','loginController@register')->name('register-mobile');
Route::get('logout','loginController@logout');

Route::post('edit-user-mobile/{id}','accountController@editUserMobile');
Route::get('get-info-user-mobile/{id}','accountController@getInfoUserMobile');

Route::get('get-privilege-registrable/{id}','accountController@get_quyen_dangky');
Route::post('upgrade-member/{id}','accountController@SaveUpgradeLevelUser');

// web

Route::post('upload-image/{id}','ImagesController@Upload');
Route::post('edit-image/{id}','ImagesController@EditImage');
Route::post('upload-image-user/{id}','ImagesController@UploadImageUser');
//đã check
Route::get('get-icon/{id}', 'ImagesController@getIcon');

//đã check
Route::get('get-banner/{id}', 'ImagesController@getBanner');

//đã check
Route::get('get-thumb-1/{id}', 'ImagesController@getThumbnail1');
//đã check
Route::get('get-thumb-2/{id}', 'ImagesController@getThumbnail2');
//đã check
Route::get('get-detail-1/{id}', 'ImagesController@getImageDetail1');
//đã check
Route::get('get-detail-2/{id}', 'ImagesController@getImageDetail2');

//không sử dụng
Route::get('get-only-icon-image', 'ImagesController@GetOnlyIconImage');

Route::get('get-avatar/{id}', 'ImagesController@getAvatar');
//đã check
Route::get('rating-service/{id}','Rating_Service_Controller@rating');
//đã check
Route::get('rating-view/{id_danhgia}','Rating_Service_Controller@view_rating');
//đã check

Route::get('rating-view-by-user/{id_user}','Rating_Service_Controller@view_rating_by_user');
//đã check

Route::post('rating-put/{id}', 'Rating_Service_Controller@putRating');
//đã check

Route::post('rating-post', 'Rating_Service_Controller@postRating');
//đã check
Route::get('ward', 'tourist_places_controller@GetWardList');
//đã check
Route::get('province', 'tourist_places_controller@GetProvinceCity');
//đã check
Route::get('ward/{id}', 'tourist_places_controller@GetWardListByID');
//đã check
Route::get('district/{id}', 'tourist_places_controller@GetDisTrictListByID');

//test
Route::get('google-maps','testGoogleMapsApi@FunctionName');
//partner
Route::get('get-services-poseted_by/month={month}&user_id={id}','Partner_Controller@getServices');

//đã check
Route::get('get-places-poseted_by/month={month}&user_id={id}','Partner_Controller@getServices');

//đã check
Route::get('get-task-list/{id}', 'Partner_Controller@getTaskList');

Auth::routes();
 
Route::get('/home', 'HomeController@index')->name('home');

//đã check
Route::get('list-schedule/{id}', 'tripScheduleController@getListTripSchedule');

//đã check
Route::post('post-schedule/user={id}', 'tripScheduleController@postTripSchedule');
//đã check
Route::post('post-schedule-details/schedule={sid}', 'tripScheduleController@postTripScheduleDetail');

//đã check
Route::get('list-schedule-details/{id}', 'tripScheduleController@getDetailTripSchedule_web');

//đã check
Route::get('list-schedule-details-web/{id}', 'tripScheduleController@getDetailTripSchedule_web');

//đã check
Route::get('schedule-one/{id}', 'tripScheduleController@getOneTripSchedule');

//đã check - LỖI
Route::get('schedule-delete/{id}', 'tripScheduleController@delete_DetailSchedule');

Route::get('get-serives-enterprise/{id}', 'vnt_enterprise_userController@getServices');

Route::get('get-list-serives-venue/{id}', 'vnt_enterprise_userController@getListServices');

Route::resource('seenevents', 'SeenEventController');

