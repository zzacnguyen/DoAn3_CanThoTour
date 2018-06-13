<?php




Route::get('/','pageController@getindex')->name('/');


// ====== LOGIN ======


Route::get('registerW','pageController@getregister')->name('registerW');
Route::get('registersuccess','pageController@getregisterSuccess')->name('registersuccess');
Route::get('logoutW','pageController@LogoutSession')->name('logoutW'); // logout
Route::get('loginW','pageController@getlogin')->name('loginW');

Route::post('loginpost','pageController@LoginSession')->name('loginpost');
Route::post('registerWpost','loginController@registerW')->name('registerWpost');

Route::get('point-for-userw/{id}', 'PointController@AllPoint_web');
// login facebook
Route::get('login/facebook/redirect', 'loginController@redirectToProvider')->name('loginfacebook');
Route::get('login/facebook/callback', 'loginController@handleProviderCallback');
Route::get('check-user-social/{id}&{email}', 'loginController@checkUserSocial');
Route::post('register-social', 'loginController@registerSocial');
Route::get('get-info-user-social/{id}', 'loginController@getInfoUserSocial');


//user
Route::get('user','pageController@getuser');

// load detail
Route::get('detail/id={id}&type={type}','pageController@getdetail')->name("detail");
Route::get('detail/s','pageController@getServiceTypeVicinity');

Route::get('ThemVaCapNhatLike/{idserivce}&user={id}','publicDetail@ThemVaCapNhatLike'); //

Route::get('count-rating-service/{idserivce}','publicDetail@count_rating_service'); //
Route::get('get-quyen-user/{iduser}','publicDetail@get_quyen_user'); //
Route::get('delete-rating/{idrating}','publicDetail@delete_rating'); //



// load addplace
Route::get('addplace','pageController@getaddplace')->name('addplace');
Route::post('addplace', 'pageController@postPlace');
//  load addservice
Route::get('addservice','pageController@getaddservice');

Route::get('city','pageController@getcount_place_city');

Route::get('lam/type={type}','pageController@findservicetocity');

Route::get('d/f={f}','pageController@typelam');

Route::get('lamdv/type={type}','pageController@getlam');

Route::get('count_place_Allcity','pageController@count_place_Allcity');
Route::get('count_place_display','pageController@count_place_display');

Route::get('lamindex/id={id}','publicDetail@get_service_id');



// detail service
Route::get('detail-service/id={id}','publicDetail@get_service_id');

Route::get('detail/id={id}&type={type}','publicDetail@get_detail');

Route::get('diadiem2/id={id}','publicDetail@dichvu_lancan');

Route::get('get-rating-w/{id}','publicDetail@getRating');
Route::get('check-user-rating/{idservice}&user_id={id}','publicDetail@checkUserRating');
Route::get('save-rating/id={id}&rating={r}&detail={t}&user={iduser}','publicDetail@save_rating');
Route::get('save-update-rating/id={id}&rating={r}&detail={t}&user={iduser}','publicDetail@save_update_rating');

Route::get('get-location-service-vicinity/location={lat},{log}&radius={r}','publicDetail@get_location_service_vicinity');


//search public
Route::get('p_search','publicSearchController@get_search');

// place_city
// Route::get('city/{id}','publicSearchController@get_place_city');

Route::get('count_ser/{id}','publicSearchController@count_servies_type');
Route::get('get_all_place_city_type/{id}&type={t}','publicSearchController@get_all_place_city_type');

Route::get('image-city/{id}','pageController@image_city');

Route::get('get-name-city/{id}','publicCityController@get_name_city');

Route::get('get-service-city-new/{idcity}&{id_district}&{type}&{boloc}','publicCityController@get_service_city_new');
Route::get('count-service-all-and-type/{id}','publicCityController@count_service_all_and_type');
Route::get('get-district-city/{id}','publicCityController@get_district_city');


//================================= TEST ======================================
Route::get('count_city_service_all_image','pageController@count_city_service_all_image');
Route::get('searchServices_All/keyword={k}','pageController@searchServices_All');

Route::get('likelam/{idser}','publicDetail@count_service_all_and_type');

Route::get('count_service_all_and_type/{id}','publicCityController@count_service_all_and_type');//test add view service
Route::get('phantrang/{id}','publicCityController@checkPaginate');

Route::get('get-services-take/type={t}&take={i}','pageController@getServicesTake');

//================================ NEW ========================================

//get num service of city all
Route::get('count-city-service-all','pageController@count_city_service_all');



//================== add place ================
Route::get('addplace','publicaddplaceController@getaddplace')->name('addplace');

Route::get('loadCity','publicaddplaceController@loadTinh')->name('loadDistrict');

Route::get('loadDistrict/{idcity}','publicaddplaceController@loadDistrict');
Route::get('loadWard/{id}','publicaddplaceController@loadWard');




//================== search header =============
Route::get('search-services-all/keyword={k}','pageController@searchServices_All');

Route::get('search-service-city-all-type/idcity={id}&keyword={k}','pageController@searchService_City_AllType');

Route::get('search-service-city-type/idcity={id}&type={t}&keyword={k}','pageController@searchService_City_Type');

Route::get('search-services-all-city-id-type/type={t}&keyword={k}','pageController@searchServices_AllCity_idType');

Route::get('search-services-all-city-idtype-ghe/type={t}&keyword={k}','pageController@searchServices_AllCity_idType_ghe');




//================= detail ==================
Route::get('checkLogin','pageController@checkLogin');

Route::get('get-service-top-view/{limit}','publicDetail@get_service_top_view');
Route::get('load-event-sv/{id_sv}','EventsController@load_event_sv');


//============ check like
Route::get('checkLike/userid={d}&svid={s}','publicDetail@checkLike');


// ================ serviece city ==============
Route::get('city/{id}&type={type}&page={p}','publicCityController@getCity');

Route::get('city-all/id={id}&district={dis}&type={type}&fil={fil}','publicCityController@get_service_city_fillter');




// =============== user info ===========
Route::get('info','accountController@get_info_account')->name('info');

Route::get('check_login','accountController@check_login');
Route::get('get-info-user/{id}','accountController@get_info_user');

Route::post('edituser/{id}',['as'=>'edituser','uses'=>'accountController@edit_user']);

Route::get('get-quyen-dangky/{id}','accountController@get_quyen_dangky');
Route::get('get-quyen-user/{id}','accountController@get_quyen_user');

Route::get('get-quyen-dangxet-user/{id}','accountController@get_quyen_dangxet_user');

Route::post('save-upgrade-level-user/{id}','accountController@SaveUpgradeLevelUser');


Route::get('get-quyen-user-list/{id}','accountController@get_quyen_userList');

Route::get('get-quyen-dangxet-user-list/{id}','accountController@get_quyen_dangxet_userList');

Route::get('get-quyen-dangky-moi/{id}','accountController@get_quyen_dangky_moi');


// index

Route::get('checklogin','pageController@checkLogin');
Route::get('count-city-service-all-image','pageController@count_city_service_all_image');


//detail

Route::get('add-view/{id}','publicDetail@addview');

Route::get('get-service-id/{id}&type={t}','publicDetail@get_service_id');
Route::get('service-same-city/idcity={c}&id={id}&limit={limit}','publicDetail@dichvu_lancan');



// serach web

Route::get('search-all/keyword={key}','pageController@searchServices_All_ghe');
Route::get('search-city-alltype/{idcity}&keyword={key}','pageController@searchService_City_AllType_ghe');
Route::get('search-allcity-type/type={type}&keyword={key}','pageController@searchServices_AllCity_idType');
Route::get('search-city-type/{idcity}&type={type}&keyword={key}','pageController@searchService_City_Type_ghe');

//
Route::get('get-service-lichtrinh','accountController@get_service_lichtrinh');

//service user
Route::post('post-add-service-user/{userid}','accountController@post_add_service_user2');
Route::get('get-service-user/{userid}','accountController@get_service_user');
Route::get('get-edit-service-user/{id}/{userid}','accountController@get_edit_service_user');
Route::post('post-edit-service-user/{id}','accountController@post_edit_service_user');
Route::get('load-place-ward/{id}','accountController@load_place_ward');

Route::get('get-service-user-active/{id}&{type}','accountController@get_service_user_active');
Route::get('top-service-view','accountController@Top_service_view');
Route::get('top-service-rating-like/{type}','accountController@Top_service_rating_like');

Route::get('get-service-user-max-view/{userid}','accountController@get_service_user_max_view');
Route::get('get-service-user-max-ating-like/{type}&{userid}','accountController@get_service_user_max_rating_like');




//place user
Route::get('get-place-user/{id}','accountController@get_place_user');
Route::get('get-edit-place-user/{userid}/{id}','accountController@get_edit_place_user');
Route::post('post-edit-place-user/{userid}/{id}','accountController@post_edit_place_user');
Route::get('get-add-place-user','accountController@get_add_place_user');
Route::post('post-add-place-user/{user_id}','accountController@post_add_place_user');



// doi mat khau

Route::post('change-pass/{id}','accountController@changePassword');

// user search
Route::get('userSearch','userSearch@store');
Route::get('save-user-search/{idserivce}&{iduser}','userSearch@save_user_search');

Route::get('get-list-user-search/{iduser}','accountController@get_user_search');

Route::get('get-top-search','accountController@get_search_nhieunhat');

// tim quanh day
Route::get('search-near/lat={latitude}&lon={longitude}&radius={radius}','SearchController@timquanhday');
// Route::get('timquanhday-moi/lat={latitude}&lon={longitude}&radius={radius}','SearchController@get_dichvu_moi');
Route::get('timquanhday-type/lat={latitude}&lon={longitude}&radius={radius}','SearchController@timquanhday_type');




// lich trinh
Route::get('get-list-trip-schedule-web-type/{userid}&type={type}','tripScheduleController@getListTripSchedule_web_type');

Route::get('search-services-all-lichtrinh/{keyword}','pageController@searchServices_All_lichtrinh');
Route::get('get-idtripschedule-web','tripScheduleController@get_idtripschedule_web');

Route::get('delete-all-detail-schedule-web/{id}','tripScheduleController@delete_All_detailSchedule_web');
Route::get('delete-schedule-web/{id}','tripScheduleController@delete_Schedule');
Route::post('edit-schedule','tripScheduleController@edit_Schedule');


//test multiple image
Route::post('multiple-upload-image/{id}','ImagesController@multipleUploadImage'); 
Route::get('get-gallery/{id}','ImagesController@get_gallery'); 
Route::delete('delete-gallery-image/{id}','ImagesController@multipleUploadImage'); 

Route::get('image-handler/s={s},d={d}','ImagesController@image_handler'); 
Route::get('watermark-img','ImagesController@watermark_img'); 



//================= EVENT ================
Route::post('add-event','EventsController@add_event_web');
Route::get('load-event/{id}','EventsController@load_event');
Route::post('seen-event-user','EventsController@seen_event_user');
Route::get('old-event-user/{id_event}','EventsController@old_event_user');

Route::post('post-type-event','typeEvents@postTypeEvent');














































?>
