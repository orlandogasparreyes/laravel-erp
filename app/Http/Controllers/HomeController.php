<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Cliente;
use App\Empleado;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            
            $num_clientes   =   DB::table('clientes')->count();
            $num_empleados  =   DB::table('empleados')->count();
        } catch (Exception $e) {
        }
        return view('home',compact("num_clientes","num_empleados"));
    }

}
