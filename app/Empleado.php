<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table ="empleados";
    protected $primaryKey ="id";

    public function cargos(){
    	return $this->belongsTo("App\Cargo","cargo");
    }

    
    
}
