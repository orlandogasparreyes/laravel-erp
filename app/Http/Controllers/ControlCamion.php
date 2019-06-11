<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidaCamion;
use App\Camion;
use DB;
use Exception;


class ControlCamion extends Controller
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
        $camiones = Camion::paginate(4);
        return view("camiones.index",compact("camiones","e"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("camiones.addCamion");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidaCamion $r)
    {
        try {
            $camion = new Camion();
            $camion->modelo = $r->input("modelo");
            $camion->matricula = $r->input("matricula");
            $camion->carga_max = $r->input("carga_max");
            $camion->transmicion =$r->input("transmicion");
            
            if ($r->hasFile('image')) {
                $camion->image = $r->file('image')->store("public");
            }
            
            $camion->save();
            $e="camion Registrado";

            
        }catch(Exception $e) {
            $e="camion No Registrado";
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
            $camion = Camion::findOrFail($id);
            
        } catch (Exception $e) {
            
        }
        return view("camiones.viewCamion",compact("camion","e"));
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
            $camion = Camion::findOrFail($id);

        }catch(Exception $e){
            $e="error-show";
        }
        return view("camiones.editCamion",compact("camion","e"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidaCamion $r, $id)
    {
        try {
            $camion = Camion::findOrFail($id);

            $camion->modelo = $r->input("modelo");
            $camion->matricula = $r->input("matricula");
            $camion->carga_max = $r->input("carga_max");
            $camion->transmicion =$r->input("transmicion");
            
            if ($r->hasFile('image')) {
                $camion->image = $r->file('image')->store("public");
            }
            $camion->save();
            $e="OK-Update";
        } catch (Exception $e) {
            $e  =   "Error-Update";
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
            $camion = Camion::findOrFail($id);
            $camion->delete();
            $msj="Los Datos Del Transporte Se Eliminaron Correctamente";
        
        } catch (Exception $e) {
            $msj="!!Error Al Eliminar Los Datos Del Transporte";
        }

        #return redirect()->action('ControlCamion@index');
        return back()->with(compact('msj'));
    }
}
