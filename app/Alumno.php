<?php
namespace ies;
use Illuminate\Database\Eloquent\Model;
class Alumno extends Model
{
    protected $table = 'alumnos';
    protected $fillable = ['alu_nombre','alu_apellido','alu_fecha_nacimiento','alu_car_id','alu_aul_id'];
    protected $primaryKey = 'alu_id';
    
    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'alu_car_id');
    }
    
    public function Aula()
    {
        return $this->belongsTo(Aula::class, 'alu_aul_id');
    }
}