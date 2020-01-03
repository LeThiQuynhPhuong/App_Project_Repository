<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NguoiChoi;
class AuthController extends Controller
{
    pub;ic function register(Request $request)
    {
    	$this->validate($request, [
    		'ten_dang_nhap' =>'required|string',
    		'mail' => 'required|email|unique:nguoi_choi',
    		'mat_khau' => 'required|confirmed', 
    	]);
    	try{
    		$user = new us
    	}
    }
}
