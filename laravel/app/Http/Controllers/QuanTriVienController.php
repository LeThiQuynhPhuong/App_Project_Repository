<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuanTriVien;

class QuanTriVienController extends Controller
{
    protected $redirectTo = 'trang-chu';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listQTV= QuanTriVien::all();
        return view('quan-tri-vien.danh-sach', compact('listQTV'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$listQTV = QuanTriVien::all();
        return view('quan-tri-vien.form');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quanTriVien =new QuanTriVien;
        $quanTriVien->ten_dang_nhap = $request->ten_dang_nhap;
        $quanTriVien->mat_khau  = $request->mat_khau;
        $quanTriVien->ho_ten = $request->ho_ten;
        $quanTriVien->save();
        return redirect()->route('quan-tri-vien.danh-sach');
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
        $quanTriVien = QuanTriVien::find($id);
        $listQTV = QuanTriVien::all();
        return view('quan-tri-vien.form', compact('quanTriVien'));
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
        $quanTriVien =QuanTriVien::find($id);
        $quanTriVien->ten_dang_nhap = $request->ten_dang_nhap;
        $quanTriVien->mat_khau  = $request->mat_khau;
        $quanTriVien->ho_ten = $request->ho_ten;
        $quanTriVien->save();
        return redirect()->route('quan-tri-vien.danh-sach'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quanTriVien = QuanTriVien::find($id);
        $quanTriVien->delete();
        return redirect()->route('quan-tri-vien.danh-sach');
    }

    public function dangNhap()
    {
       return view('dang-nhap.dang-nhap');
    }
   
    public function xuLyDangNhap(Request $request)
    {
        // Quản trị viên đâu cần trả về token em?
        // Và dùng Auth để chứng thực lun chứ nhỉ?
        $ten_dang_nhap= $request->ten_dang_nhap;
        $mat_khau= $request->mat_khau;
        if(auth('web')->attempt(['ten_dang_nhap' => $ten_dang_nhap, 'password' => $mat_khau]))
        {
            return redirect()->route('linh-vuc.danh-sach');
        }
        return "Dang nhap that bai";
    }
    
    public function layThongTin(Request $request)
    {
        return Auth::id();
    }
    
    public function dangXuat()
    {
        auth('web')->logout();
        return redirect()->route('dang-nhap');
    }
}
