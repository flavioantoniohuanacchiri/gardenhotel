<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('sections', function (Blueprint $table) {
        $table->increments('id');
        $table->smallInteger('section');
        $table->text('ubicacion');
        $table->text('ubicacion_en');
        $table->text('telefono');
        $table->text('email');
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
      Schema::dropIfExists('sections');
    }
}
