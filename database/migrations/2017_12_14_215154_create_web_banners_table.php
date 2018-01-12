<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('web_banners', function (Blueprint $table) {
        $table->increments('id');
        $table->string('titulo', 250);
        $table->string('titulo_en', 250);
        $table->text('descripcion');
        $table->text('descripcion_en');
        $table->string('path_imagen');
        $table->string('path_imagen_sm');
        $table->string('path_imagen_md');
        $table->string('estado')->default(1);
        $table->smallInteger('section_id');
        $table->smallInteger('orden');
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() //php artisan migrate:rest
    {
      Schema::dropIfExists('web_banners');
    }
}
