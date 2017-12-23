<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('modulo', function (Blueprint $table) {
        $table->increments('id');
        $table->string('class_icon', 100);
        $table->string('nombre', 250);
        $table->string('url', 250);
        $table->smallInteger('parent');
        $table->smallInteger('visible');
        $table->smallInteger('orden');
        $table->smallInteger('estado');
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
      Schema::dropIfExists('modulo');
    }
}
