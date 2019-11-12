<?php

use Illuminate\Database\Seeder;

class ThemNguoiChoiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nguoi_choi=[];
        $nguoi_choi[]=[
        	"ten_dang_nhap"=>"tuyet nhi",
        	"mat_khau"=>"123",
        	"mail"=>"a@gmail.com",
        	"hinh_dai_dien"=>"1.png",
        	"diem_cao_nhat"=>"10",
        	"credit"=>"1"
        ];
        $nguoi_choi[]=[
        	"ten_dang_nhap"=>"ngoc hien",
        	"mat_khau"=>"abc",
        	"mail"=>"b@gmail.com",
        	"hinh_dai_dien"=>"2.png",
        	"diem_cao_nhat"=>"12",
        	"credit"=>"2"
        ];
        $nguoi_choi[]=[
        	"ten_dang_nhap"=>"quynh phuong",
        	"mat_khau"=>"123abc",
        	"mail"=>"c@gmail.com",
        	"hinh_dai_dien"=>"3.png",
        	"diem_cao_nhat"=>"9",
        	"credit"=>"0"
        ];
        $i=1;
        foreach($nguoi_choi as $nc)
        {
        	echo "Them nguoi choi thu".$i."\n";
        	App\NguoiChoi::create($nc);
        	$i++;
        }
        echo "Hoan thanh...";
    }
    }
}
