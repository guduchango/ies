<?php
namespace ies;
use Illuminate\Database\Eloquent\Model;
class Materia extends Model
{
    protected $table = 'materias';
    protected $fillable = ['mat_nombre','mat_car_id'];
    protected $primaryKey = 'mat_id';
    
}