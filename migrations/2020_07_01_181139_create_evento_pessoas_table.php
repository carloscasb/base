<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventoPessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento_pessoas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('evento_id');
            $table->unsignedBigInteger('pessoa_id');


            $table->foreign('evento_id')
                        ->references('id')
                        ->on('eventos')
                        ->onDelete('cascade');
            $table->foreign('pessoa_id')
                        ->references('id')
                        ->on('pessoas')
                        ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evento_pessoas');
    }
}
