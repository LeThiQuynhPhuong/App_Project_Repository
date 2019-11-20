<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NguoiChoi extends Model
{
    use SoftDeletes;
   protected $table = 'nguoi_choi';
}
