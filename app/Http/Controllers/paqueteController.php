<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paquete;
use App\Vehiculo;
use DB;

class paqueteController extends Controller
{

    public function registrar() {
        $vehiculo = Vehiculo::all();
        return view('registrarPaquete', compact('vehiculo'));
     }

	public function guardar(Request $datos) {
         
        $paquete = new Paquete();
        $paquete->nombre=$datos->input('nombre');
        $paquete->costo=$datos->input('costo');
        $paquete->vehiculo_id=$datos->input('vehiculo');
        $paquete->save();

        return redirect('consultarPaquetes');

    }

	public function consultar() {

		$paquete = DB::table('paquete')
        ->join('vehiculo', 'paquete.vehiculo_id', '=', 'vehiculo.id')
        ->select('paquete.*', 'paquete.id AS id', 'nombre', 'costo', 'vehiculo.tipo AS tipo')
        ->get();

      	return view('consultarPaquetes', compact('paquete'));

   }

    public function editar($id) {

    $vehiculo = Vehiculo::all();

    $paquete = DB::table('paquete')
    ->where('id', $id)
    ->select('paquete.*')
    ->first();

    return view('editarPaquete', compact('vehiculo', 'paquete'));

  }

  public function actualizar(Request $datos, $id) {

    $paquete = Paquete::find($id);
    $paquete->nombre=$datos->input('nombre');
    $paquete->costo=$datos->input('costo');
    $paquete->vehiculo_id=$datos->input('vehiculo');
    $paquete->save();

    return redirect('consultarPaquetes');

  }

  public function eliminar($id) {

    $paquete = Paquete::find($id);
    $paquete->delete();

    return redirect('consultarPaquetes');

  }

}
