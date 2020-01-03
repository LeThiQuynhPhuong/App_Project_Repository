<?php

use Illuminate\Database\Seeder;

class LinhVucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $linh_vuc = [];
        $linh_vuc[]=[
        	"ten_linh_vuc" => "Lịch Sử"
        ];
          $linh_vuc[]=[
        	"ten_linh_vuc" => "Văn Học"
        ];
          $linh_vuc[]=[
        	"ten_linh_vuc" => "Thể Thao"
        ];
          $linh_vuc[]=[
        	"ten_linh_vuc" => "Toán Học"
        ];
        $i = 1;
		// Thêm lĩnh vực vào bảng linh_vuc trong CSDL
		foreach ($linh_vuc as $lv) {
			echo "Them linh vuc thu " . $i . "\n";
			App\LinhVuc::create($lv);
			$i++;
		}
		echo "Hoan thanh...";
    }
}
