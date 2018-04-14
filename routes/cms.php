<?php
	
	Route::get('lvtn-dashboard', 'CMS_ModuleController@getDashboard')->name('ADMIN_DASHBOARD');
	Route::post('lvtn-dashboard', 'CMS_AddDataController@_POST_TASK');
	Route::get('delete-task/{id}', 'CMS_DeleteDataController@_DELETE_TASK')->name('DELETE_TASK');
	Route::get('test', 'CMS_ComponentController@_DISPLAY_LIST_ALL_USER');

	Route::get('lvtn-list-user', 'CMS_ComponentController@_DISPLAY_LIST_ALL_USER')->name('ALL_LIST_USER');

	
