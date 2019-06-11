<?php

namespace App\Http\Controllers;
use App\Cliente;
use DB;
use Excel;
use Illuminate\Http\Request;
use App\Http\Requests\ValidaCliente;
use Exception;


class ControlCliente extends Controller
{
    //Se aplica el middleware auth para verificar si hay una sesión Activa.
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
        $clientes = Cliente::paginate(3);
        return view("clientes.index",compact("clientes","e"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view("clientes.addCliente");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidaCliente $r)
    {
        try {
            $cliente = new Cliente();
            $cliente->nombre    =   $r->input("nombre");
            $cliente->telfijo   =   $r->input("telfijo");
            $cliente->telmovil  =   $r->input("telmovil");
            $cliente->email     =   $r->input("correo");
            $cliente->domicilio =   $r->input("direccion");
            $cliente->cpostal   =   $r->input("cpostal");
            $cliente->rfc       =   $r->input("rfc");
            $cliente->tipo      =   $r->input("tipoC");

            if ($r->hasFile('image')) {
                $cliente->image = $r->file('image')->store("public");
            }
            
            $cliente->save();
            $e  =   "Cliente Registrado";
            
        }catch(Exception $e) {
            $e  =   "Cliente No Registrado";
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
        $e = "";
        try{
            $cliente = Cliente::findOrFail($id);

        }catch(Exception $e){
            $e="error-show";
        }
        return view("clientes.viewCliente",compact("cliente","e"));
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
            $cliente = Cliente::findOrFail($id);

        }catch(Exception $e){
            $e="error-show";
        }
        return view("clientes.editCliente",compact("cliente","e"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidaCliente $r, $id)
    {
        try {
            $cliente = Cliente::findOrFail($id);
            $cliente->nombre    =   $r->input("nombre");
            $cliente->telfijo   =   $r->input("telfijo");
            $cliente->telmovil  =   $r->input("telmovil");
            $cliente->email     =   $r->input("correo");
            $cliente->domicilio =   $r->input("direccion");
            $cliente->cpostal   =   $r->input("cpostal");
            $cliente->rfc       =   $r->input("rfc");
            $cliente->tipo      =   $r->input("tipoC");
            if ($r->hasFile('image')) {
                $cliente->image = $r->file('image')->store("public");
            }
            
            $cliente->save();
     
            $e = "ok-update";
        } catch (Exception $e) {
            $e="error-update";
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
            $cliente = Cliente::findOrFail($id);
            $cliente->delete();
            $msj ="Los Datos Del Cliente Se Eliminaron Correctamente";
        } catch (Exception $e) {
            $msj ="!!Error Al Eliminar El Cliente";
        }
        return back()->with(compact('msj'));
    }

    public function exportxls(){
     
        $clientes = Cliente::all();
        Excel::create("Export_Clientes", function ($excel) use ($clientes) {
            $excel->setTitle("Title");
            $excel->sheet("Sheet 1", function ($sheet) use ($clientes) { 
                $sheet->fromArray($clientes);
            });
        })->download('xls');
        return back();
    }
}
