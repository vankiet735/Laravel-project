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

// Route::get('linh-vuc', function () {
//     return view('ds-linh-vuc');
// });
// 
// Route::get('linh-vuc/them-moi',function(){
// 	return view('form-linh-vuc');
// });
Route::prefix('linh-vuc')->group(function(){
	Route::get('/','LinhVucController@index')->name('linh-vuc.danh-sach');
	Route::get('them-moi','LinhVucController@create')->name('linh-vuc.them-moi');
	Route::post('them-moi','LinhVucController@store')->name('linh-vuc.xl-them-moi');
	Route::get('cap-nhat/{id}','LinhVucController@edit')->name('cap-nhat');
	Route::post('cap-nhat/{id}','LinhVucController@update')->name('xu-ly-cap-nhat');
	Route::get('xoa/{id}','LinhVucController@destroy')->name('xoa');
});

Route::prefix('cau-hoi')->group(function(){
	Route::get('/','CauHoiController@index')->name('cau-hoi.danh-sach');
	Route::get('them-moi','CauHoiController@create')->name('cau-hoi.them-moi');
	Route::post('them-moi','CauHoiController@store')->name('cau-hoi.xl-them-moi');
});