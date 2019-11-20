<?php

use Illuminate\Database\Seeder;

class ThemLinhVucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $linh_vuc=[];
        $linh_vuc[]=[
        	"ten_linh_vuc"=>"Thể thao"
        ];
        $linh_vuc[]=[
        	"ten_linh_vuc"=>"Lịch sử"
        ];
        $linh_vuc[]=[
        	"ten_linh_vuc"=>"Âm nhạc-Phim"
        ];
        $linh_vuc[]=[
        	"ten_linh_vuc"=>"Văn học"
        ];
        $linh_vuc[]=[
        	"ten_linh_vuc"=>"Khoa học tự nhiên"
        ];
        $i=1;
        foreach($linh_vuc as $lv)
        {
        	echo "Them linh vuc thu".$i."\n";
        	App\LinhVuc::create($lv);
        	$i++;
        }
        echo "Hoan thanh...";
    }
}
