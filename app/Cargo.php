<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table ="cargos";
    protected $primaryKey ="id";

    public function empleados(){
    	return $this->hasMany("App\Empleado","cargo");
    } 



}
