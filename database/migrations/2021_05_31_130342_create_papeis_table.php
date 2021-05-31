<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePapeisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papeis', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('descricao');
            $table->timestamps();
        });
        Schema::create('papel_permissao', function (Blueprint $table) {
            $table->integer('papel_id')->unsigned();
            $table->foreign('papel_id')->references('id')->on('papeis')->onDelete('cascade');
            $table->integer('permissao_id')->unsigned();
            $table->foreign('permissao_id')->references('id')->on('permissoes')->onDelete('cascade');
            $table->primary(['papel_id', 'permissao_id']);
        });
        Schema::create('papel_user', function (Blueprint $table) {
            $table->integer('papel_id')->unsigned();
            $table->foreign('papel_id')->references('id')->on('papeis')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->primary(['papel_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('papel_permissao');
        Schema::dropIfExists('papel_user');
        Schema::dropIfExists('papeis');
    }
}
