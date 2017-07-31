<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cuenta;
use App\Paquete;
use App\Vehiculo;
use App\Sucursal;
use App\Evaluacion;
use DB;

class perfilController extends Controller
{
    public function consultar() {

        $usuario = DB::table('users')
        ->select('users.*')
        ->where('users.id', auth()->user()->id)
        ->get();

    	$cuenta = DB::table('cuenta')
        ->join('paquete', 'cuenta.paquete_id', '=', 'paquete.id')
        ->join('users', 'cuenta.cliente_id', '=', 'users.id')
        ->join('sucursal', 'cuenta.sucursal_id', '=', 'sucursal.id')
        ->select('cuenta.*', 'cuenta.id AS orden', 'cuenta.costo AS costo', 'users.name AS cliente', 'paquete.nombre AS paquete', 'cuenta.created_at AS fecha', 'numero', 'calle', 'colonia')
        ->where('users.id', auth()->user()->id)
        ->orderBy('cuenta.id', 'desc')
        ->get();

        $evaluacion = DB::table('evaluacion')
        ->join('cuenta', 'evaluacion.cuenta_id', '=', 'cuenta.id')
        ->join('users', 'cuenta.cliente_id', '=', 'users.id')
        ->select('evaluacion.*', 'evaluacion.id AS id', 'calificacion', 'comentario', 'users.id AS idCliente', 'name', 'cuenta_id')
        ->where('users.id', auth()->user()->id)
        ->orderBy('evaluacion.id', 'desc')
        ->get();

        return view('miPerfil', compact('usuario', 'cuenta', 'evaluacion'));

    }

    public function evaluar($id) {

    	$cuenta = DB::table('cuenta')
        ->join('paquete', 'cuenta.paquete_id', '=', 'paquete.id')
        ->join('users', 'cuenta.cliente_id', '=', 'users.id')
        ->join('sucursal', 'cuenta.sucursal_id', '=', 'sucursal.id')
        ->select('cuenta.*', 'cuenta.id AS orden', 'cuenta.costo AS costo', 'users.name AS cliente', 'paquete.nombre AS paquete', 'cuenta.created_at AS fecha', 'numero', 'calle', 'colonia')
        ->where('cuenta.id', $id)
        ->get();

        return view('evaluar', compact('cuenta'));

    }

	public function guardar(Request $datos) {

        $evaluacion = new Evaluacion();
        $evaluacion->calificacion=$datos->input('calificacion');
        $evaluacion->comentario=$datos->input('comentario');
        $evaluacion->cuenta_id=$datos->input('cuenta');
        $evaluacion->save();
         
        return redirect('miPerfil');

    }

    public function editar($id) {

    $usuario = DB::table('users')
    ->select('users.*', 'name', 'apellido_paterno AS ap', 'apellido_materno AS am', 'fecha_de_nacimiento AS fn', 'codigo_postal AS cp', 'email', 'password')
    ->where('id', $id)
    ->first();

    return view('editarPerfil', compact('usuario'));

  }

  public function actualizar(Request $datos, $id) {

    $usuario = User::find($id);
    $usuario->name=$datos->input('name');
    $usuario->apellido_paterno=$datos->input('ap');
    $usuario->apellido_materno=$datos->input('am');

    // Si eres un administrador puedes cambiar la fecha
    if (auth()->user()->rol == 1)
        $usuario->fecha_de_nacimiento=$datos->input('fn');

    $usuario->codigo_postal=$datos->input('cp');
    $usuario->email=$datos->input('email');

    // Si la contraseña esta vacia no se guarda
    if ( ! $datos->input('password') == '')
        $usuario->password = bcrypt($datos->input('password'));

    $usuario->rol=$datos->input('rol');
    $usuario->save();

    return redirect()->back();

  }

}
