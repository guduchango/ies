<?php
namespace ies\Repositories;
 
use ies\Repositories\AluRepositoryInterface;
use ies\Alumno;
 
class AluRepository implements AluRepositoryInterface {
	
	public function selectAll()
	{
		return Alumno::all();
	}
	
	public function find($id)
	{
		return Alumno::find($id);
	}
}