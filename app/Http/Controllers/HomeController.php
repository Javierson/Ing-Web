<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Sucursal;
use App\Promocion;
use DB;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('home');
    }

    public function landingPage() {

    $direccion = Sucursal::all();

    $informacion = DB::table('empresa')
    ->select('empresa.*', 'nombre', 'mision', 'vision', 'correo', 'telefono')//->where('empresa', 1)
    ->where('id', 1)
    ->get();

    $promocion = DB::table('promocion')
    ->select('promocion.*', 'nombre', 'descripcion', 'fecha_de_inicio AS fi', 'fecha_de_expiracion AS fe', 'descuento')
    ->where('privacidad', 0)
    ->get();

    return view('home', compact('direccion', 'informacion', 'promocion'));

  }


}
