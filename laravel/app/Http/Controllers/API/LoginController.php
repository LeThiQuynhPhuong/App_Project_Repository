<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
   public function dangNhap(Request $request)
   {
   	 $credentials = [
   	 	'ten_dang_nhap' => $req->ten_dang_nhap,
   	 	'mat_khau' => $req->mat_khau
   	 ];
   	 if(!$token = auth('api')->attempt($credentials))
   	 {
   	 	//sai tên đăng nhập || mật khẩu
   	 	return response()->json([
   	 		'status' => false,
   	 		'message' => 'Unauthorized.'
   	 	],401);
   	 }
   	 //chứng thực thành công
   	 return response()->json([
   	 	'status' => true,
   	 	'message' => 'Authorized.',
   	 	'token' => $token,
   	 	'type' => 'bearer',
   	 	'expires' => auth('api')->factory()->getTTL()*60
   	 ],200);
   }
}
