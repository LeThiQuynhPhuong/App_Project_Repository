<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLSMuaCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('l_s_mua_credit', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nguoi_choi_id');
            $table->integer('goi_credit_id');
            $table->integer('credit');
            $table->integer('so_tien');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('l_s_mua_credit');
    }
}
