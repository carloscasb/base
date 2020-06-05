<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->required();
            $table->string('url')->unique();
            $table->string('vulgo')->required();
            $table->string('mae')->nullable();
            $table->string('genero')->nullable();
            $table->string('rg')->unique();
            $table->string('exp')->nullable();
            $table->string('cpf')->unique();
            $table->string('situa')->uninullableque();
            $table->string('nasc')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('pessoas');
    }
}
