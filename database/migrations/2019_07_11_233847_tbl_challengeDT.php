<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblChallengeDT extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tbl_challengeDT');
        Schema::create('tbl_challengeDT', function (Blueprint $table) {
            $table->increments('idChallengeDT');
            $table->text('title');
            $table->text('description');
            $table->integer('completado')->default(0);
            $table->integer('total')->default(0);
            $table->integer('idChallenge')->unsigned();
            $table->date('fechaInicio')->nullable();
            $table->date('fechaFin')->nullable();
            $table->foreign('idChallenge','fk_challenge_DT')->references('idChallenge')->on('tbl_challenge');
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
        Schema::dropIfExists('tbl_challengeDT');
    }
}
