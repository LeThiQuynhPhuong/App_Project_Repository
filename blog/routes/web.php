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
    return view('layout');
})->name('dashboard'); 


Route::prefix('linh-vuc')->group(function() {
	Route::name('linh-vuc.')->group(function() {
		Route::get('/','LinhVucController@index')->name('danh-sach');
		Route::get('them-moi','LinhVucController@create')->name('them-moi');
		Route::post('them-moi','LinhVucController@store')->name('xu-ly-them-moi');
		Route::get('cap-nhat/{id}','LinhVucController@edit')->name('cap-nhat');
		Route::post('cap-nhat/{id}','LinhVucController@update')->name('xu-ly-cap-nhat');
		Route::get('xoa/{id}','LinhVucController@destroy')->name('xoa');
	});
});


Route::prefix('cau-hoi')->group(function() {
	Route::name('cau-hoi.')->group(function() {
		Route::get('/','CauHoiController@index')->name('danh-sach');
		Route::get('them-moi','CauHoiController@create')->name('them-moi');
		Route::post('them-moi','CauHoiController@store')->name('xu-ly-them-moi');
		Route::get('cap-nhat/{id}','CauHoiController@edit')->name('cap-nhat');
		Route::post('cap-nhat/{id}','CauHoiController@update')->name('xu-ly-cap-nhat');
		Route::get('xoa/{id}','CauHoiController@destroy')->name('xoa');
	});
});
Route::prefix('nguoi-choi')->group(function() {
	Route::name('nguoi-choi.')->group(function() {
		Route::get('/','NguoiChoiController@index')->name('danh-sach');
		Route::get('them-moi','NguoiChoiController@create')->name('them-moi');
		Route::post('them-moi','NguoiChoiController@store')->name('xu-ly-them-moi');
		Route::get('cap-nhat/{id}','NguoiChoiController@edit')->name('cap-nhat');
		Route::post('cap-nhat/{id}','NguoiChoiController@update')->name('xu-ly-cap-nhat');
		Route::get('xoa/{id}','NguoiChoiController@destroy')->name('xoa');
	});
});
Route::prefix('luot-choi')->group(function() {
	Route::name('luot-choi.')->group(function() {
		Route::get('/','LuotChoiController@index')->name('danh-sach');
		Route::get('them-moi','LuotChoiController@create')->name('them-moi');
		Route::post('them-moi','LuotChoiController@store')->name('xu-ly-them-moi');
		Route::get('cap-nhat/{id}','LuotChoiController@edit')->name('cap-nhat');
		Route::post('cap-nhat/{id}','LuotChoiController@update')->name('xu-ly-cap-nhat');
		Route::get('xoa/{id}','LuotChoiController@destroy')->name('xoa');
	});
});
Route::prefix('ls-mua-credit')->group(function() {
	Route::name('ls-mua-credit.')->group(function() {
		Route::get('/','LSMuaCreditController@index')->name('danh-sach');
		Route::get('them-moi','LSMuaCreditController@create')->name('them-moi');
		Route::post('them-moi','LSMuaCreditController@store')->name('xu-ly-them-moi');
		Route::get('cap-nhat/{id}','LSMuaCreditController@edit')->name('cap-nhat');
		Route::post('cap-nhat/{id}','LSMuaCreditController@update')->name('xu-ly-cap-nhat');
		Route::get('xoa/{id}','LSMuaCreditController@destroy')->name('xoa');
	});
});
Route::prefix('quan-tri-vien')->group(function() {
	Route::name('quan-tri-vien.')->group(function() {
		Route::get('/','QuanTriVienController@index')->name('danh-sach');
		Route::get('them-moi','QuanTriVienController@create')->name('them-moi');
		Route::post('them-moi','QuanTriVienController@store')->name('xu-ly-them-moi');
		Route::get('cap-nhat/{id}','QuanTriVienController@edit')->name('cap-nhat');
		Route::post('cap-nhat/{id}','QuanTriVienController@update')->name('xu-ly-cap-nhat');
		Route::get('xoa/{id}','QuanTriVienController@destroy')->name('xoa');
	});
});