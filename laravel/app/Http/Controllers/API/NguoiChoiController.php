<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NguoiChoi;

use Illuminate\Support\Facades\Hash;
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

    public function dangNhap(Request $req) 
    {
       
    $credentials = [
        'ten_dang_nhap' => $req->ten_dang_nhap,
        'password' => $req->mat_khau
     ];
     if(!$token = auth('api')->attempt($credentials))
     {
        //sai tên đăng nhập || mật khẩu
        return response()->json([
            'success' => false,
            'message' => 'Unauthorized.'
        ],401);
     }
     //$token = "aaa";
     //chứng thực thành công
     return response()->json([
        'success' => true,
        'message' => 'Authorized.',
        'token' => $token,
        'type' => 'bearer',
        'expires' => auth('api')->factory()->getTTL()*60
     ],200);
   }
   public function layThongTin(Request $request)
   {
        return auth('api')->user();
    
   }
   public function dangKy(Request $request)
   {
        $nguoichoi = new NguoiChoi;
        $nguoichoi->ten_dang_nhap = $request->ten_dang_nhap;
        $nguoichoi->mat_khau =$request->mat_khau;
        $nguoichoi->mail = $request->mail;
        $img=$request->hinh_dai_dien;
        $foo =base64_decode("$img");
        file_put_contents("assets/images/users/".$request->ten_dang_nhap.time().".JPG", $foo);
        $nguoichoi->hinh_dai_dien=$request->ten_dang_nhap.time().".JPG" ;
        $nguoichoi->diem_cao_nhat= $request->diem_cao_nhat;
        $nguoichoi->credit = $request->credit;
        $nguoichoi->save();   

   }
   public function update(Request $request,$id)
   {
    $nguoichoi=NguoiChoi::findOrFail($id);
    $nguoichoi->ten_dang_nhap=$request->ten_dang_nhap;
    $nguoichoi->mat_khau=$request->mat_khau;
    $nguoichoi->mail=$request->mail;
    $img=$request->hinh_dai_dien;
    $foo =base64_decode("$img");
    file_put_contents("assets/images/users/".$request->ten_dang_nhap.time().".JPG", $foo);
    $nguoichoi->hinh_dai_dien=$request->ten_dang_nhap.time().".JPG" ;
    $nguoichoi->diem_cao_nhat=$request->diem_cao_nhat;
    $nguoichoi->credit=$request->credit;
    $nguoichoi->save();
   }
 
    public function CapNhatDoiMK(Request $request,$id)
   {
     $nguoichoi=NguoiChoi::findOrFail($id);
     $nguoichoi->mat_khau=$request->mat_khau;
     $nguoichoi->save();     
   
   }
   public function LayDanhSach(){
        $listNguoiChoi = NguoiChoi::all()->orderBy('diem_cao_nhat','desc')->get();
        $result=[
            'success'=>true,
            'data'=>$listNguoiChoi
        ];
        return response()->json($result);
    }
    public function LayDSLichSu()
    {
        $dslichsu = DB::table('nguoi_choi')
        ->select('nguoi_choi.ten_dang_nhap','luot_choi.diem')
        ->join('luot_choi','luot_choi.nguoi_choi_id','=','nguoi_choi.id')
        ->orderBy('diem','desc')
        ->distinct('nguoi_choi.ten_dang_nhap')
        ->get('nguoi_choi.ten_dang_nhap');
        $result=[
            'success'=>true,
            'data'=>$dslichsu
        ];
        return response()->json($result);
    }

public function CapNhatCreditNguoiChoi(Request $request)
    {
        

        $nguoichoi = NguoiChoi::find($request->id);
        $nguoichoi->credit=$request->credit;
        $nguoichoi->save();

    }

    public function updatediem(Request $request,$id)
    {
        $nguoichoi=NguoiChoi::findOrFail($id);
        $nguoichoi->diem_cao_nhat=$request->diem_cao_nhat;
        $nguoichoi->save();
        return response()->json();
    }
    public function updatecredit(Request $request,$id)
    {
        $nguoichoi=NguoiChoi::findOrFail($id);
        $nguoichoi->credit=$request->credit;
        $nguoichoi->save();
        return response()->json();
    }
}
