<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelefonePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefones_pessoa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pessoa_id');;
            $table->string('numero');    
            $table->string('description'); 
            $table->timestamps();
                                          //   (fazendo o relacioamaneto)
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
        Schema::dropIfExists('telefones_pessoa');
    }
}
