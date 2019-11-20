<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class LichSuMuaCredit extends Model
{
 use SoftDeletes;
 protected $table='l_s_mua_credit';
   
}
