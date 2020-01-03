<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('linh-vuc', 'API\LinhVucController@layDanhSach');
Route::get('cau-hoi', 'API\CauHoiController@layCauHoi');
Route::get('luot-choi','API\LuotChoiController@layLuotChoi');
Route::get('nguoi-choi','API\NguoiChoiController@layNguoiChoi');
//Route::get('ls-mua-credit','API\LSMuaCreditController@')


//Route::post('dang-nhap', 'API\LoginController@dangNhap');
Route::middleware(['assign.guard:api', 'jwt.auth'])->group(function(){
	Route::get('user/lay-thong-tin','API\NguoiChoiController@layThongTin');
	Route::post('dang-nhap', 'API\NguoiChoiController@dangNhap');
});
Route::post('nguoi-choi/them-nguoi-choi','API\NguoiChoiController@dangKy');
//cập nhật người  chơi
Route::post('nguoi-choi/chinhsua-nguoichoi/{id}','API\NguoiChoiController@update');
//quên mk

Route::post('nguoi-choi/cap_nhat_doimk/{id}','API\NguoiChoiController@CapNhatDoiMK');