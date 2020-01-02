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
public function CapNhatCreditNguoiChoi(Request $request)
    {
        

        $nguoichoi = NguoiChoi::find($request->id);
        $nguoichoi->credit=$request->credit;
        $nguoichoi->save();

    }

}
