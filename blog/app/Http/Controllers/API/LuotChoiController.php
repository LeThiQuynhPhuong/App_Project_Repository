<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LuotChoi;
class LuotChoiController extends Controller
{
    public function layLuotChoi(Request $request)
    {
    	$NguoiChoiID = $request->query('nguoi_choi');
        $luotChoi = luotChoi::where('nguoi_choi_id', $NguoiChoiID)->get()->random(1);

        $result = [
            'success' => true,
            'data'    => $luotChoi
        ];
        return response()->json($result);
    }
}
,