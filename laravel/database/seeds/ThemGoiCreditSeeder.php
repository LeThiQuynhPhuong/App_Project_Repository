<?php

use Illuminate\Database\Seeder;

class Themgoi_creditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $goi_credit=[];
        $goi_credit[]=[
        	"ten_goi"=>"goi 1",
        	"credit"=>"5",
        	"so_tien"=>"5000"
        ];
        $goi_credit[]=[
        	"ten_goi"=>"goi 2",
        	"credit"=>"15",
        	"so_tien"=>"10000"
        ];
        $goi_credit[]=[
        	"ten_goi"=>"goi 3",
        	"credit"=>"25",
        	"so_tien"=>"15000"    ];
        $i=1;
        foreach($goi_credit as $gc)
        {
        	echo "Them goi credit thu".$i."\n";
        	App\GoiCredit::create($gc);
        	$i++;
        }
        echo "Hoan thanh...";
    }
 }