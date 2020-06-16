<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrcrimPessoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orcrim_pessoa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('orcrim_id');
            $table->unsignedBigInteger('pessoa_id');


            $table->foreign('orcrim_id')
                        ->references('id')
                        ->on('orcrims')
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
        Schema::dropIfExists('orcrim_pessoa');
    }
}
