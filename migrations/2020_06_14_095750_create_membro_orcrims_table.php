<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembroOrcrimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membros_orcrim', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('orcrim_id');;
            $table->string('name')->required();
           
            $table->string('func')->required();
            $table->string('lidera')->nullable();
            $table->string('quebrada')->nullable();
            $table->string('padrinho')->nullable();
            $table->string('databast')->nullable();
            $table->string('localbast')->unique();
            $table->string('atua')->uninullableque();
            $table->text('description')->nullable();
            $table->timestamps();

               //   (fazendo o relacioamaneto)
               $table->foreign('orcrim_id')
               ->references('id')
               ->on('orcrims')
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
        Schema::dropIfExists('membros_orcrim');
    }
}
