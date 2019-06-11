<?php

namespace App\Http\Controllers;
use App\Precio;
use DB;
use Illuminate\Http\Request;

class ControlPrecio extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index($e="")
    {
        $precios = Precio::all();
        return view("precios.index",compact("precios","e"));
    }

    public function edit($id)
    {
        $e = "";
        try{
            $precio = Precio::findOrFail($id);
        }catch(Exception $e){
            $precio= null;
            $e="error-show";
        }
        return view("precios.edit",compact("precio","e"));
    }
    public function update(Request $r, $id)
    {
        try {
            $precio = Precio::findOrFail($id);
            $precio->descripcion = $r->input("descripcion");
            $precio->precio_kg = $r->input("precio");
            $precio->save();
            $e = "ok-update";
        } catch (Exception $e) {
            $e="error-update";
        }
        return $this->index($e);
    }
}
