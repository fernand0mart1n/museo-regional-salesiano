<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFotoPiezaPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_pieza', function (Blueprint $table) {
            $table->integer('foto_id')->unsigned()->index();
            $table->foreign('foto_id')->references('id')->on('fotos')->onDelete('cascade');
            $table->integer('pieza_id')->unsigned()->index();
            $table->foreign('pieza_id')->references('id')->on('piezas')->onDelete('cascade');
            $table->primary(['foto_id', 'pieza_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('foto_pieza');
    }
}
