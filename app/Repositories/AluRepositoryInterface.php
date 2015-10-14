<?php
namespace ies\Repositories;
 
interface AluRepositoryInterface {
	
	public function selectAll();
	
	public function find($id);
	
}