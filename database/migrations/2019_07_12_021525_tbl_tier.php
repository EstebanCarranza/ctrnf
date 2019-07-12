<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblTier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::dropIfExists('tbl_tier');
        Schema::create('tbl_tier', function (Blueprint $table) {
            $table->increments('idTier');
            $table->text('title');
            $table->text('description');
            $table->integer('bronze')->default(0);
            $table->integer('silver')->default(0);
            $table->integer('gold')->default(0);
            $table->date('fechaInicio')->nullable();
            $table->date('fechaFin')->nullable();
            
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
        //
          Schema::dropIfExists('tbl_tier');
    }
}
