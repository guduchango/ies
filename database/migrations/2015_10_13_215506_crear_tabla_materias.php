<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaMaterias extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('materias', function($table) {
            $table->increments('mat_id');
            $table->string('mat_nombre');
            $table->string('mat_car_id');
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
        Schema::dropIfExists('materias');
    }
}
