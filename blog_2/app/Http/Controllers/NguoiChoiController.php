<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NguoiChoi;
use App\LinhVuc;
use App\Http\Requests\NguoiChoiRequest;
use App\Http\Requests\UpDateNguoiChoiRequest;

class NguoiChoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listNguoiChoi = NguoiChoi::all();
        return view('nguoi-choi.danh-sach', compact('listNguoiChoi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listNguoiChoi = NguoiChoi::all();
        return view('nguoi-choi.form', compact('listNguoiChoi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nguoiChoi = new nguoiChoi;
        $nguoiChoi->ten_dang_nhap = $request->ten_dang_nhap;
        $nguoiChoi->mat_khau = $request->mat_khau;
        $nguoiChoi->mail = $request->mail;
        $nguoiChoi->hinh_dai_dien = $request->hinh_dai_dien;
        $nguoiChoi->diem_cao_nhat= $request->diem_cao_nhat;
        $nguoiChoi->credit = $request->credit;
        $nguoiChoi->save();

        return redirect()->route('nguoi-choi.danh-sach');
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
        $nguoiChoi = nguoiChoi::find($id);
        $listNguoiChoi = NguoiChoi::all();
        return view('nguoi-choi.form', compact('nguoiChoi'));
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
        $$nguoiChoi = new nguoiChoi;
        $nguoiChoi->ten_dang_nhap = $request->ten_dang_nhap;
        $nguoiChoi->mat_khau = $request->mat_khau;
        $nguoiChoi->mail = $request->mail;
        $nguoiChoi->hinh_dai_dien = $request->hinh_dai_dien;
        $nguoiChoi->diem_cao_nhat= $request->diem_cao_nhat;
        $nguoiChoi->credit = $request->credit;
        $nguoiChoi ->save();

        return redirect()->route('nguoi-choi.danh-sach');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nguoiChoi = nguoiChoi::find($id);
        $nguoiChoi->delete();

        return redirect()->route('nguoi-choi.danh-sach')->with('success','xóa thành công');
    }

    public function showDeleted(){
        $listNguoiChoiRestore = NguoiChoi::onlyTrashed()->get();
        return view('nguoi-choi.danh-sach', compact('listNguoiChoiRestore'));
    }
    
    public function reStore($id){
        NguoiChoi::withTrashed()->find($id)->restore();
        return redirect()->route('nguoi-choi.danh-sach')->with('thongbao','Khôi phục người chơi thành công');
    }
}
