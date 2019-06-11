<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidaEmpleado;
use App\Empleado;
use App\Cargo;

use Exception;


class ControlEmpleado extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($e = "")
    {
        $empleados = Empleado::with("cargos")->paginate(3);
        return view("empleados.index",compact("empleados","e"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos = Cargo::all();
        return view("empleados.addEmpleado",compact("cargos"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidaEmpleado $r)
    {
        try {
            $empleado = new Empleado();

            $empleado->nombre = $r->input("nombre");
            $empleado->apellidos = $r->input("apellidos");
            $empleado->domicilio = $r->input("domicilio");
            $empleado->curp = $r->input("curp");
            $empleado->rfc = $r->input("rfc");
            $empleado->nss = $r->input("nss");
            $empleado->num_cuenta = $r->input("num_cuenta");
            $empleado->cargo = $r->input("cargo");
            $empleado->usuario = auth()->user()->name;


            if ($r->hasFile('image')) {
                $empleado->image = $r->file('image')->store("public");
            }
            $empleado->save();
            $e  =   "OK-Insert";
            
        }catch(Exception $e) {
            $e  =   "Error-Insert";
        }
        return $this->index($e); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        try {
            $cargos = Cargo::all();
            $empleado = Empleado::findOrFail($id);
        } catch (Exception $e) {
            
        }
        return view("empleados.viewEmpleado",compact("empleado","cargos"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $e = "";
        try{
            $empleado = Empleado::findOrFail($id);
            $cargos = Cargo::all();
        }catch(Exception $e){
            $e="error-show";
        }
        return view("empleados.editEmpleado",compact("empleado","cargos","e"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidaEmpleado $r, $id)
    {
        try {
            $empleado=Empleado::findOrFail($id);

            $empleado->nombre = $r->input("nombre");
            $empleado->apellidos = $r->input("apellidos");
            $empleado->domicilio = $r->input("domicilio");
            $empleado->curp = $r->input("curp");
            $empleado->rfc = $r->input("rfc");
            $empleado->nss = $r->input("nss");
            $empleado->num_cuenta = $r->input("num_cuenta");
            $empleado->cargo = $r->input("cargo");
            $empleado->usuario = auth()->user()->name;

            if ($r->hasFile('image')) {
                $empleado->image = $r->file('image')->store("public");
            }
            $empleado->save();
            $e  =   "OK-Insert";
            
        }catch(Exception $e) {
            $e  =   "Error-Insert";
        }
        return $this->index($e); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $empleado = Empleado::findOrFail($id);
            $empleado->delete();
            $msj="Los Datos Del Empleado Se Eliminaron Correctamente";
        
        } catch (Exception $e) {
            $msj="!!Error Al Eliminar Los Datos Del Empleado";
        }

        #return redirect()->action('ControlCamion@index');
        return back()->with(compact('msj'));
    }
}
