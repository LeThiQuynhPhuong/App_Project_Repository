<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class LuotChoi extends Model
{
    use SoftDeletes;
    protected $table = 'luot_choi';
    //protected $table = 'chi_tiet_luot_choi';
	public function nguoiChoi()
   {
   		return $this->belongsTo('App\NguoiChoi');
   }
   /*public function chiTietLuotChoi()
   {
   		return $this->hasMany('App\ChiTietLuotChoi');
   }*/
}
