<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoria_id');
            $table->string('nome', 30)->unique();
            $table->decimal('preco', 8, 2);
            $table->unsignedBigInteger('composicao_id');
            $table->enum('tamanho', ['M', 'P', 'G', 'GG']);
            $table->integer('quantidade');
            $table->string('imagem1', 100)->nullable();
            $table->string('imagem2', 100)->nullable();
            $table->string('imagem3', 100)->nullable();
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
        Schema::dropIfExists('produtos');
    }
}
