<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidaEnvio;
use App\Envio;
use App\Paquete;
use DB;
class ControlEnvio extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     *         $paquetes = $r->input("paquete");
        *for ($i=0;$i<count($paquetes);$i++)
        *{
            *echo "<br> Cerveza " . $i . ": " . $paquetes[$i];
        *} 
     *  
     * */ 
    public function store(ValidaEnvio $r)
    {
        try {
        /*  $paquetes => Obtiene los id de los paquetes seleccionados   */
        $paquetes = $r->input("paquete");
        /*  $rutaid => Obtiene el id de la ruta de los paquetes seleccionados  */
        $rutaid=$r->input("ruta");

        /* Inserta los paquetes enviados*/
        for ($i=0;$i<count($paquetes);$i++){
            /* Se crea un nuevo objeto por cada recorrido*/ 
            $envio = new Envio();
            $envio->ruta = $rutaid;
            $envio->paquete = $paquetes[$i];
            $envio->save();

            /* Se actualiza el estado de los paquetes seleccionados*/ 
            $paquete = Paquete::findOrFail($paquetes[$i]);
            $paquete->estado = 0;
            $paquete->save();
            $e="Paquete Registrado";           
        }
        $e  =   "Ok-Insert";
        } catch (Exception $e)  {
            $e  =   "Error-Insert";
        }
        return redirect()->action('ControlPaquete@index');
    }
 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $envios = Envio::where('ruta','=',$id)->get();
        
        return view("envios.index",compact("envios","e"));

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