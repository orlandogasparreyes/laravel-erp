<?php

namespace App\Http\Controllers;
use App\Mail\OfertaEmail;
use Mail;
use Illuminate\Http\Request;
use App\Http\Requests\ValidaPromocion;
use App\Promocion;
use Exception;
use App\Cliente;

class ControlPromocion extends Controller
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
        $promociones = Promocion::orderBy('created_at', 'desc')->paginate(3);
        return view("promociones.index",compact("promociones","e"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("promociones.addPromocion");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidaPromocion $r)
    {
        try {
            $promocion = new Promocion();
            $promocion->titulo =$r->input("titulo");
            $promocion->descripcion =$r->input("descripcion");
            $promocion->fecha_ini =$r->input("fecha_ini");
            $promocion->fecha_fin =$r->input("fecha_fin");
            if ($r->hasFile('image')) {
                $promocion->image = $r->file('image')->store("public");
            }
            $promocion->estado = "primary";
            $promocion->usuario = auth()->user()->id;

            $promocion->save();

            $e="Ok-Insert";

        } catch (Exception $e) {
            $e="Error-Insert";
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

    public function emailsend($id){
        try {
            $promocion = Promocion::findOrFail($id);
            $clientes=Cliente::all();
            foreach ($clientes as $c) {
                Mail::to($c->email)->send(new OfertaEmail($c,$promocion));
            }
            $e="Ok-Insert";
        } catch (Exception $e) {
            $e="Error-Insert";
        }
        return redirect()->action('ControlPromocion@index');
    }

}
