<?php

use Illuminate\Database\Seeder;
class Themluot_choiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        	$luot_choi=[];
        	$luot_choi[]=[
        	"nguoi_choi_id" =>"1",
        	"so_cau"=>"6",
        	"diem"=>"600",
        	];
        	$luot_choi=[
        	"nguoi_choi_id" =>"2",
        	"so_cau"=>"5",
        	"diem"=>"500",
        	];
        	$luot_choi=[
        	"nguoi_choi_id" =>"3",
        	"so_cau"=>"0",
        	"diem"=>"0",
        	];
        	$luot_choi=[
        	"nguoi_choi_id" =>"4",
        	"so_cau"=>"8",
        	"diem"=>"800",
        	];
        	$luot_choi=[
        	"nguoi_choi_id" =>"5",
        	"so_cau"=>"6",
        	"diem"=>"600",
        	];
        	$luot_choi=[
        	"nguoi_choi_id" =>"6",
        	"so_cau"=>"10",
        	"diem"=>"1000",
        	];
        	$i = 1;
		// Thêm lĩnh vực vào bảng linh_vuc trong CSDL
		foreach ($luot_choi as $lc) {
			echo "Them luot choi thu " . $i . "\n";
			App\LuotChoi::create($lc);
			$i++;
		}
		echo "Hoan thanh...";
    }
}