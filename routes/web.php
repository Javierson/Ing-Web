<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Ruta de la pagina de aterrizaje



Route::get('/', 'HomeController@landingPage');

Route::get('/home', 'HomeController@landingPage');

// Rutas del Sistema

// Gestion

Route::get('/gestion', 'empresaController@gestion');

// Empresa

Route::get('/registrarEmpresa', 'empresaController@registrar');

Route::get('/editarEmpresa/{id}', 'empresaController@editar');

Route::post('/actualizarEmpresa/{id}', 'empresaController@actualizar');

Route::post('/guardarEmpresa', 'empresaController@guardar');

Route::get('/consultarEmpresas', 'empresaController@consultar');

Route::get('/eliminarEmpresa/{id}', 'empresaController@eliminar');

// Sucursal

Route::get('/registrarSucursal', 'sucursalController@registrar');

Route::post('/guardarSucursal', 'sucursalController@guardar');

Route::get('/editarSucursal/{id}', 'sucursalController@editar');

Route::post('/actualizarSucursal/{id}', 'sucursalController@actualizar');

Route::get('/consultarSucursales', 'sucursalController@consultar');

Route::get('/eliminarSucursal/{id}', 'sucursalController@eliminar');

// Vehiculos

Route::get('/registrarVehiculo', 'vehiculoController@registrar');

Route::post('/guardarVehiculo', 'vehiculoController@guardar');

Route::get('/editarVehiculo/{id}', 'vehiculoController@editar');

Route::post('/actualizarVehiculo/{id}', 'vehiculoController@actualizar');

Route::get('/consultarVehiculos', 'vehiculoController@consultar');

Route::get('/eliminarVehiculo/{id}', 'vehiculoController@eliminar');

// Paquetes

Route::get('/registrarPaquete', 'paqueteController@registrar');

Route::post('/guardarPaquete', 'paqueteController@guardar');

Route::get('/editarPaquete/{id}', 'paqueteController@editar');

Route::post('/actualizarPaquete/{id}', 'paqueteController@actualizar');

Route::get('/consultarPaquetes', 'paqueteController@consultar');

Route::get('/eliminarPaquete/{id}', 'paqueteController@eliminar');

// Promocion

Route::get('/registrarPromocion', 'promocionController@registrar');

Route::post('/guardarPromocion', 'promocionController@guardar');

Route::get('/editarPromocion/{id}', 'promocionController@editar');

Route::post('/actualizarPromocion/{id}', 'promocionController@actualizar');

Route::get('/consultarPromociones', 'promocionController@consultar');

Route::get('/eliminarPromocion/{id}', 'promocionController@eliminar');

// Rutas del Cliente

Route::get('/registrarCliente', 'clienteController@registrar');

Route::post('/guardarCliente', 'clienteController@guardar');

Route::get('/consultarClientes', 'clienteController@consultar');

Route::get('/eliminarCliente/{id}', 'clienteController@eliminar');

// Cuentas

// Consultar datos del Cliente

//Route::post('/registrarCuenta', 'cuentaController@Customer');

//

Route::get('/registrarCuenta', 'cuentaController@registrar');

Route::post('/guardarCuenta', 'cuentaController@guardar');

Route::get('/consultarCuentas', 'cuentaController@consultar');

Route::get('/eliminarCuenta/{id}', 'cuentaController@eliminar');

// Mi perfil

Route::get('/miPerfil', 'perfilController@consultar');

Route::get('/editarPerfil/{id}', 'perfilController@editar');

Route::post('/actualizarPerfil/{id}', 'perfilController@actualizar');

Route::get('/evaluar/{id}', 'perfilController@evaluar');

Route::post('/guardarEvaluacion', 'perfilController@guardar');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
