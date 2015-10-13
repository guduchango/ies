<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CrearTablaAlumnos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function($table) {
            $table->increments('alu_id');
            $table->string('alu_nombre');
            $table->string('alu_apellido');
            $table->date('alu_fecha_nacimiento');
            $table->integer('alu_car_id');
            $table->integer('alu_aul_id');
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
        Schema::dropIfExists('alumnos');
    }
}