<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('descricao');
            $table->string('imagem');
            $table->integer('editora_id')->unsigned();
            $table->integer('autors_id')->unsigned();
            $table->integer('generos_id')->unsigned();
            $table->string('arquivo');
            $table->timestamps();

            $table->foreign('editora_id')->references('id')->on('editoras');
            $table->foreign('autors_id')->references('id')->on('autors');
            $table->foreign('generos_id')->references('id')->on('generos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livros');
    }
}
