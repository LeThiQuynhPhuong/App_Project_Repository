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

/*Route::get('/', function () {
    return view('layout');
})->name('dashboard'); */
Route::middleware('auth:web')->group(function()
{
	Route::get('dang-xuat','QuanTriVienController@dangXuat')->name('dang-xuat');

});
Route::get('test','QuanTriVienController@layThongTin');
Route::get('dang-nhap','QuanTriVienController@dangNhap')->name('dang-nhap');
Route::post('dang-nhap','QuanTriVienController@xuLyDangNhap')->name('xu-ly-dang-nhap');
Route::get('dang-xuat','QuanTriVienController@dangXuat')->name('dang-xuat');
Route::middleware('auth:web')->group(function()
{
	Route::get('dang-xuat','QuanTriVienController@dangXuat')->name('dang-xuat');
	Route::prefix('linh-vuc')->group(function() {
	Route::name('linh-vuc.')->group(function() {
		Route::get('/','LinhVucController@index')->name('danh-sach')->middleware('auth:web');
		Route::get('them-moi','LinhVucController@create')->name('them-moi');
		Route::post('them-moi','LinhVucController@store')->name('xu-ly-them-moi');
		Route::get('cap-nhat/{id}','LinhVucController@edit')->name('cap-nhat');
		Route::post('cap-nhat/{id}','LinhVucController@update')->name('xu-ly-cap-nhat');
		Route::get('xoa/{id}','LinhVucController@destroy')->name('xoa');
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
	
});

Route::prefix('linh-vuc')->group(function(){
	Route::name('linh-vuc.')->group(function(){ 
		Route::get('/', 'LinhVucController@index')->name('danh-sach');
		Route::get('them-moi', 'LinhVucController@create')->name('them-moi');
		Route::post('them-moi', 'LinhVucController@store')->name('xu-ly-them-moi');
		Route::get('cap-nhat/{id}', 'LinhVucController@edit')->name('cap-nhat');
		Route::post('cap-nhat/{id}', 'LinhVucController@update')->name('xu-ly-cap-nhat');   
		Route::get('xoa/{id}', 'LinhVucController@destroy')->name('xoa');
		Route::get('restore', 'LinhVucController@showDeleted')->name('restore');
		Route::get('restore/{id}', 'LinhVucController@reStore')->name('xu-ly-restore');
	});
});
Route::prefix('goi-credit')->group(function() {
	Route::name('goi-credit.')->group(function() {
		Route::get('/','GoiCreditController@index')->name('danh-sach');
		Route::get('them-moi','GoiCreditController@create')->name('them-moi');
		Route::post('them-moi','GoiCreditController@store')->name('xu-ly-them-moi');
		Route::get('cap-nhat/{id}','GoiCreditController@edit')->name('cap-nhat');
		Route::post('cap-nhat/{id}','GoiCreditController@update')->name('xu-ly-cap-nhat');
		Route::get('xoa/{id}','GoiCreditController@destroy')->name('xoa');
		Route::get('restore', 'GoiCreditController@showDeleted')->name('restore');
		Route::get('restore/{id}', 'GoiCreditController@reStore')->name('xu-ly-restore');
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
		Route::get('restore', 'CauHoiController@showDeleted')->name('restore');
		Route::get('restore/{id}', 'CauHoiController@reStore')->name('xu-ly-restore');
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
		Route::get('restore', 'NguoiChoiController@showDeleted')->name('restore');
		Route::get('restore/{id}', 'NguoiChoiController@reStore')->name('xu-ly-restore');
	});
});
