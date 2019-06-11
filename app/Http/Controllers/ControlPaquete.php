<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidaPaquete;
use Exception;
use App\Paquete;
use App\Cliente;
use App\Ruta;

use DB;

class ControlPaquete extends Controller
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
        $rutas = Ruta::all();
        $idpaquetes = Paquete::where('estado','1')->get();
        $paquetes = Paquete::where('estado','1')->paginate(3);
        return view("paquetes.index",compact("rutas","idpaquetes","paquetes","e"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view("paquetes.addPaquete",compact("clientes"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidaPaquete $r)
    {
        try {
            $paquete = new Paquete();
            $paquete->descripcion = $r->input("descripcion");
            $paquete->dimensiones = $r->input("dimensiones");
            $paquete->destinatario = $r->input("destinatario");
            $paquete->direccion_dest = $r->input("direccion_dest");
            $paquete->telf_destino = $r->input("telf_destino");
            $paquete->estado = 1;

            $pesokg = $r->input("peso");
            $paquete->peso = $pesokg;
            $preciokg = DB::table('precios')->where('id', '1')->value('precio_kg');
            $precioT = $pesokg * $preciokg;
            $paquete->costo_envio = $precioT;
            $paquete->cliente = $r->input("cliente");
            $paquete->save();
            $e="Paquete Registrado";

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
