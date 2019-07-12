<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblTrack extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::dropIfExists('tbl_track');
        Schema::create('tbl_track', function (Blueprint $table) {
            $table->increments('idTrack');
            $table->integer('numberTrack')->default(0);
            $table->text('title');
            $table->text('pathImg');
            $table->integer('mode');//1 (race), 2 (battle), 3 (cup)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_track');
    }
}
