<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentPessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_pessoas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->required();
            $table->unsignedBigInteger('parent_id');
            $table->unsignedBigInteger('pessoa_id');

            $table->timestamps();
            $table->foreign('parent_id')
                        ->references('id')
                        ->on('parent_pessoas')
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
        Schema::dropIfExists('parent_pessoas');
    }
}
