<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebDescripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('web_decripciones', function (Blueprint $table) {
        $table->increments('id');
        $table->string('titulo', 250);
        $table->string('titulo_en', 250);
        $table->text('descripcion');
        $table->text('descripcion_en');
        $table->smallInteger('section_id');
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
      Schema::dropIfExists('web_decripciones');
    }
}
