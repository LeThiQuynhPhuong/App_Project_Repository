<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LichSuMuaCredit;
class LSMuaCreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listLSMuaCredit = LichSuMuaCredit::all();
        return view('ls-mua-credit.danh-sach', compact('listLSMuaCredit')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$listLSMuaCredit = LichSuMuaCredit::all();
        return view('ls-mua-credit.form');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lsMuaCredit= new LichSuMuaCredit;
        $lsMuaCredit->nguoi_choi_id=$request->nguoi_choi_id;
        $lsMuaCredit->goi_credit_id=$request->goi_credit_id;
        $lsMuaCredit->credit=$request->credit;
        $lsMuaCredit->so_tien=$request->so_tien;
        $lsMuaCredit->save();
        return redirect()->route('ls-mua-credit.danh-sach');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lsMuaCredit = LichSuMuaCredit::find($id);
        return view('ls-mua-credit.form', compact('ls-mua-credit'));     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lsMuaCredit=LichSuMuaCredit::find($id);
        $lsMuaCredit->nguoi_choi_id=$request->nguoi_choi_id;
        $lsMuaCredit->goi_credit_id=$request->goi_credit_id;
        $lsMuaCredit->credit=$request->credit;
        $lsMuaCredit->so_tien=$request->so_tien;
        $lsMuaCredit->save();
        return redirect()->route('ls-mua-credit.danhsach');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lsMuaCredit = LichSuMuaCredit::find($id);
        $lsMuaCredit->delete();

        return redirect()->route('ls-mua-credit.danh-sach');    
    }
}
