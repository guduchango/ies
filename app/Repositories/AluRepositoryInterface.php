<?php
namespace ies\Repositories;
use Illuminate\Http\Request;
 
interface AluRepositoryInterface {
	
	public function aluSelectAll();
        
        public function aulSelectAll();
        
        public function carSelectAll();
	
	public function aluFind($id);
        
        public function aluSave(Request $request);
        
        public function aluUpdate(Request $request,$id);
        
        public function aluDestroy($id);
        
	
}