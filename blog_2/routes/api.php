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
//Route::get('ls-mua-credit','API\LSMuaCreditController@')
Route::get('goi-credit','API\GoiCreditController@layGoiCredit');
Route::get('nguoi-choi/cap-nhat-credit','API\NguoiChoiController@CapNhatCreditNguoiChoi');
Route::get('ls-mua-credit/them-moi','API\LichSuMuaCreditController@ThemLichSuMua');