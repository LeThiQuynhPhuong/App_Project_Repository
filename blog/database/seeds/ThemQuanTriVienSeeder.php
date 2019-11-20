<?php

use Illuminate\Database\Seeder;

class ThemQuanTriVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [];
        $admin[]=[
        	"ten_dang_nhap" => "NgocHien",
        	"mat_khau" => "hien123",
        	"ho_ten" => "Nguyễn Ngọc Hiền",

        ];
          $admin[]=[
        	"ten_dang_nhap" => "TuyetNhi",
        	"mat_khau" => "nhi123",
        	"ho_ten" => "Lê Dư Tuyết Nhi",
        ];
          $admin[]=[
        	"ten_dang_nhap" => "QuynhPhuong",
        	"mat_khau" => "phuong123",
        	"ho_ten" => "Lê Thị Quỳnh Phương",
        ];
        $i = 1;
		// Thêm lĩnh vực vào bảng linh_vuc trong CSDL
		foreach ($admin as $ad) {
			echo "Them admin thu " . $i . "\n";
			App\QuanTriVien::create($ad);
			$i++;
		}
		echo "Hoan thanh...";
    }
}
