<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\SoftDeletes;

class NguoiChoi extends Authenticatable implements JWTSubject
{
   protected $table = 'nguoi_choi';
  
   public function getPasswordAttribute()
   {
   	 	return $this->mat_khau;
   }
   public function getJWTIdentifier(){
   		return $this->getKey();
   }
   public function getJWTCustomClaims()
   {
   		return [];
   }
}
