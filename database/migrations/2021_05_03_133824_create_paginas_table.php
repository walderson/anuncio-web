<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaginasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paginas', function (Blueprint $table) {
            $table->id();
            $table->string("titulo")->unique();
            $table->string("descricao");
            $table->text("texto");
            $table->string("imagem")->nullable();
            $table->string("mime")->nullable();
            $table->text("conteudo")->nullable();
            $table->text("mapa")->nullable();
            $table->string("email")->nullable();
            $table->string("tipo");
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
        Schema::dropIfExists('paginas');
    }
}
