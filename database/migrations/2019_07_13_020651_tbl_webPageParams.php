<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblWebPageParams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::dropIfExists('tbl_webPageParams');
        Schema::create('tbl_webPageParams', function (Blueprint $table) {
            $table->increments('idWebPageParams');
            $table->text('title');
            $table->text('description');
            $table->integer('value')->default(0);
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
        Schema::dropIfExists('tbl_webPageParams');
    }
}
