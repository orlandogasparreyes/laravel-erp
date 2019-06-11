<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "clientes";//Nombre De La Tabla En La BD
    protected $primaryKey = "id";//Llave De La Tabla clientes En La BD

    
}
