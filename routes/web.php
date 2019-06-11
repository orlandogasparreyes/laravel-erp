<?php
use App\Mail\TestEmail;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Rutas Controlador Clientes
Route::resource('cliente','ControlCliente');
Route::get("export/clientes","ControlCliente@exportxls")->name("cliente.excel");
//Rutas Controlador Precios
Route::resource('precio','ControlPrecio');
//Rutas Controlador Camiones
Route::resource('camion','ControlCamion');
//Rutas Controlador Paquete
Route::resource('paquete','ControlPaquete');
//Rutas Controlador Promocion
Route::resource('promocion','ControlPromocion');

Route::get('/sendemail/{id}', 'ControlPromocion@emailsend')->name('promocion.email');

//Rutas Controlador Promocion
Route::resource('empleado','ControlEmpleado');
//Rutas Controlador Ruta
Route::resource('ruta','ControlRuta');
//Rutas Controlador Envios
Route::resource('envio','ControlEnvio');

