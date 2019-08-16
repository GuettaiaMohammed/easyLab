<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterielsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiels', function (Blueprint $table) {
            $table->increments('id');
             $table->string('numero');
            $table->string('libelle');
            $table->string('affected_at');
            $table->datetime('deleted_at')->nullable();
            $table->integer('equipe_id')->unsigned();
            $table->integer('categorie_id')->unsigned();
            $table->integer('user_id')->unsigned();
        
            
            $table->timestamps();

            $table->foreign('equipe_id')->references('id')->on('equipes');
            $table->foreign('categorie_id')->references('id')->on('categories');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materiels');
    }
}
