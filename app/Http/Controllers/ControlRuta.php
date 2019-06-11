<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidaRuta;
use App\Ruta;
use App\Empleado;
use App\Camion;
use Exception;
use DB;



class ControlRuta extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($e ="")
    {
        /*$rutas=Ruta::paginate(1);*/
        #Query Builder
        /*$rutas = DB::table('rutas')->paginate(2);*/
        $rutas = DB::table('rutas')
            ->join('camiones', 'rutas.camion', '=', 'camiones.id')
            ->join('empleados', 'rutas.empleado', '=', 'empleados.id')
            ->select('rutas.*','camiones.modelo','empleados.nombre')->paginate(4);
        return view("rutas.index",compact("rutas","e"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $camiones = Camion::all();
        $empleados = Empleado::where('cargo','3')->get();
        return view("rutas.addRuta",compact("camiones","empleados"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidaRuta $r)
    {
        try {
            $ruta = new Ruta();
            $ruta->folio = $r->input("folio");
            $ruta->ruta = $r->input("ruta");
            $ruta->camion = $r->input("camion");
            $ruta->empleado = $r->input("empleado");
            $ruta->estado = "success";
            $ruta->save();
            $e="Ruta Registrada";
        } catch (Exception $e) {
            $e="Error De Registro";
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
