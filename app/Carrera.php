<?php
namespace ies;
use Illuminate\Database\Eloquent\Model;
class Carrera extends Model
{ 
    protected $table = 'carreras';
    protected $fillable = ['car_nombre'];
    protected $primaryKey = 'car_id';
}