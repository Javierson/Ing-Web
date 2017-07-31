<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Sucursal;
use App\Promocion;
use App\Evaluacion;
use DB;

class empresaController extends Controller {

	public function registrar() {
         $empresa=Empresa::all();
         return view('registrarEmpresa', compact('empresa'));
     }

	public function guardar(Request $datos) {
         
         $empresa = new Empresa();
         $empresa->nombre=$datos->input('nombre');
         $empresa->mision=$datos->input('mision');
         $empresa->vision=$datos->input('vision');
         $empresa->correo=$datos->input('correo');
         $empresa->telefono=$datos->input('telefono');
         $empresa->save();
         
         return redirect('consultarEmpresas');

   }

	public function consultar() {

      $empresa = DB::table('empresa')
      ->select('empresa.*', 'nombre', 'mision', 'vision', 'correo', 'telefono')
      ->get();

      return view('consultarEmpresas', compact('empresa'));

   }

  public function editar($id) {

    $empresa = DB::table('empresa')
    ->where('id', $id)
    ->select('empresa.*', 'nombre', 'mision', 'vision', 'correo', 'telefono')
    ->first();

    return view('editarEmpresa', compact('empresa'));

  }

  public function actualizar(Request $datos, $id) {

    $empresa = Empresa::find($id);
    $empresa->nombre=$datos->input('nombre');
    $empresa->mision=$datos->input('mision');
    $empresa->vision=$datos->input('vision');
    $empresa->correo=$datos->input('correo');
    $empresa->telefono=$datos->input('telefono');
    $empresa->save();

    return redirect('consultarEmpresas');

  }

  public function gestion() {

    $gestion = DB::table('empresa')
    ->select('empresa.*', 'nombre', 'mision', 'vision', 'correo', 'telefono')
    ->where('id', 1)
    ->get();

    $administrador = DB::table('users')
    ->select('users.*', 'users.id AS id', 'name', 'fecha_de_nacimiento AS fn', 'email', 'rol')
    ->where([
        ['users.id', '>', '0'],
        ['users.rol', 1],
        ])->get();   

    $visita = DB::table('cuenta')
    ->join('users', 'cuenta.cliente_id', '=', 'users.id')
    ->select(DB::raw('count(cuenta.id) AS cantidad', 'cuenta.id'), 'users.*', 'users.id AS id')
    ->where('users.id', '>', 0)
    ->groupBy('users.id','users.name', 'apellido_paterno', 'apellido_materno', 'fecha_de_nacimiento', 'codigo_postal', 'email', 'password', 'remember_token', 'puntos', 'rol', 'empresa_id', 'created_at', 'updated_at')
    ->orderBy('cantidad')
    ->get();

    $calificacion = DB::table('evaluacion')
    ->join('cuenta', 'evaluacion.cuenta_id', '=', 'cuenta.id')
    ->join('sucursal', 'cuenta.sucursal_id', '=', 'sucursal.id')
    ->select(DB::raw('count(calificacion) AS cantidad', 'calificacion'), DB::raw('sum(calificacion) AS sumatoria', 'calificacion'), DB::raw('avg(calificacion) AS promedio', 'calificacion'), 'sucursal.id AS sucursal', 'sucursal.*')
    ->groupBy('cuenta.sucursal_id', 'sucursal.id', 'numero', 'calle', 'cp', 'colonia', 'municipio', 'estado', 'empresa_id', 'created_at', 'updated_at')
    ->get();

    $count = DB::table('evaluacion')
    ->select(DB::raw('count(calificacion) AS cantidad', 'calificacion'), DB::raw('sum(calificacion) AS sumatoria', 'calificacion'), DB::raw('avg(calificacion) AS promedio', 'calificacion'))
    ->whereNotNull('calificacion')
    ->get();

    $ganancias = DB::table('cuenta')
    ->select(DB::raw('sum(costo) AS ganancias', 'costo'))
    ->get();

    return view('gestion', compact('gestion', 'administrador', 'visita', 'calificacion' ,'count', 'ganancias'));

  }

   public function eliminar($id) {
      
      $empresa = Empresa::find($id);
      $empresa->delete();
      
      return redirect('consultarEmpresas');

   }

}
