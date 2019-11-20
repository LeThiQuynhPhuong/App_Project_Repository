<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuanTriVien extends Model
{
    use SoftDeletes;
    protected $table = 'quan_tri_vien';
}
