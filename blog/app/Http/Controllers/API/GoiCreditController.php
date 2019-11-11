<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GoiCredit;

class GoiCreditController extends Controller
{
    public function layGoiCredit(Request $request)
    {
    	$ListGoiCredit = GoiCredit::all();
    	$result = [
    		'success' => true,
    		'data'    => $ListGoiCredit
    	];
    	return response()->json($result);
    }
}
