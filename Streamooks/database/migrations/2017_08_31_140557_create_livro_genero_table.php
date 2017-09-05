<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivroGeneroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livro_genero', function (Blueprint $table) {
            $table->primary(['livro_id', 'genero_id']);
            $table->integer('livro_id')->unsigned();
            $table->integer('genero_id')->unsigned();
            $table->timestamps();
            $table->foreign('livro_id')->references('id')->on('livros');
            $table->foreign('genero_id')->references('id')->on('generos');
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
    }
}
