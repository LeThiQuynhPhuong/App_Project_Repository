<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NguoiChoi;
class NguoiChoiController extends Controller
{
    //
    public function layNguoiChoi(Request $request)
    {
    	$ListNguoiChoi = NguoiChoi::all();
    	$result = [
    		'success' => true,
    		'data'    => $ListNguoiChoi
    	];
    	return response()->json($result);
    }
}
