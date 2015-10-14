<?php
namespace ies;
use Illuminate\Database\Eloquent\Model;
class Aula extends Model
{
    protected $table = 'aulas';
    protected $fillable = ['aul_id','aul_nombre'];
    protected $primaryKey = 'aul_id';
}