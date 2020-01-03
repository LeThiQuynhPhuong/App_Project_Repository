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

         $player[]=[
        	'ten_dang_nhap' => 'hien',
    		'mat_khau' => Hash::make('123456'),
    		'mail' => 'ngochiennguyen0204@gmail.com',
    		'hinh_dai_dien' => 'hinh1.jpg',
    		'diem_cao_nhat' => '1000',
    		'credit' => '100'

        ];
          $player[]=[
        	'ten_dang_nhap' => 'nhi',
    		'mat_khau' => Hash::make('123456'),
    		'mail' => 'nhi1810@gmail.com',
    		'hinh_dai_dien' => 'hinh2.jpg',
    		'diem_cao_nhat' => '1000',
    		'credit' => '100'
        ];
          $player[]=[
        	'ten_dang_nhap' => 'phuong',
    		'mat_khau' =>Hash::make('123456'),
    		'mail' => 'phuong1503@gmail.com',
    		'hinh_dai_dien' => 'hinh3.jpg',
    		'diem_cao_nhat' => '1000',
    		'credit' => '100'
        ];
        $i = 1;
		// Thêm lĩnh vực vào bảng linh_vuc trong CSDL
		foreach ($player as $pl) {
			echo "Them player thu " . $i . "\n";
			App\NguoiChoi::create($pl);
			$i++;
		}
		echo "Hoan thanh...";
    }
    	
}
