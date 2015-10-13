<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use ies\Materia;
use ies\Alumno;
use ies\Aula;
use ies\Carrera;
class DatabaseSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Materia::truncate();
        Alumno::truncate();
        Aula::truncate();
        Carrera::truncate();
        $faker = Faker\Factory::create();
        $aulas = ['aula1', 'aula2', 'aula3', 'aula4', 'aula5', 'aula5'];
        foreach ($aulas as $var) {
            $aula = [
                'aul_nombre' => $var,
            ];
            Aula::create($aula);
        }
        for ($i = 1; $i < 5; $i++) {
            $alumno = [
                'alu_nombre' => $faker->firstName(),
                'alu_apellido' => $faker->lastName(),
                'alu_fecha_nacimiento' => $faker->dateTimeBetween($startDate = '-25 years', $endDate = '-18 years'),
                'alu_car_id' => $faker->randomElement(array(1, 2, 3)),
                'alu_aul_id' => $faker->randomElement(array(1, 2, 3, 4, 5, 6))
            ];
            Alumno::create($alumno);
        }
        $materias = ['física', 'quimica', 'matematica', 'lengua', 'programación', 'ingles'];
        foreach ($materias as $var) {
            $materia = [
                'mat_nombre' => $var,
                'mat_car_id' => $faker->randomElement(array(1, 2, 3)),
            ];
            Materia::create($materia);
        }
        $carreras = ['Analista', 'Seguridad', 'Infraestructura'];
        foreach ($carreras as $var) {
            $carrera =  [
                'car_nombre' => $var,
            ];
            Carrera::create($carrera);
        }
    }
}