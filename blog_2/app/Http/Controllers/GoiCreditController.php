<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GoiCredit;
use App\Http\Requests\GoiCreditRequest;
use App\Http\Requests\UpDateGoiCreditRequest;

class GoiCreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listGoiCredit = GoiCredit::all();
        return view('goi-credit.danh-sach', compact('listGoiCredit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listGoiCredit = GoiCredit::all();
        return view('goi-credit.form', compact('listGoiCredit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $goiCredit = new GoiCredit;
        $goiCredit->ten_goi = $request->ten_goi;
        $goiCredit->credit = $request->credit;
        $goiCredit->so_tien = $request->so_tien;
        $goiCredit->save();

        return redirect()->route('goi-credit.danh-sach')->with('thongbao','Thêm mới gói credit thành công');
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
        $goiCredit = GoiCredit::find($id);
        return view('goi-credit.form', compact('goiCredit'));
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
        $goiCredit = GoiCredit::find($id);
        $goiCredit->ten_goi = $request->ten_goi;
        $goiCredit->credit = $request->credit;
        $goiCredit->so_tien = $request->so_tien;
        $goiCredit ->save();

        return redirect()->route('goi-credit.danh-sach')->with('thongbao','Cập nhật gói credit thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $goiCredit = GoiCredit::find($id);
        $goiCredit->delete();

        return redirect()->route('goi-credit.danh-sach')->with('thongbao','Xóa gói credit thành công');
    }
    public function showDeleted(){
        $listGoiCreditRestore = GoiCredit::onlyTrashed()->get();
        return view('goi-credit.danh-sach', compact('listGoiCreditRestore'));
    }
    
    public function reStore($id){
        GoiCredit::withTrashed()->find($id)->restore();
        return redirect()->route('goi-credit.danh-sach')->with('thongbao','Khôi phục gói credit thành công');
    }
}
