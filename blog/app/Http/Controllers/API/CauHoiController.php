<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CauHoi;

class CauHoiController extends Controller
{
    public function layCauHoi(Request $request)
    {
    	$linhVucID = $request->query('linh_vuc');
    	$cauHoi = CauHoi::where('linh_vuc_id', $linhVucID)->get();

    	$result = [
    		'success' => true,
    		'data'    => $cauHoi
    	];
    	return response()->json($result);
    }
}
