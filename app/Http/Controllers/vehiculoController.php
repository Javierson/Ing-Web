<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehiculo;
use DB;

class vehiculoController extends Controller
{

	public function registrar() {
         $vehiculo=Vehiculo::all();
         return view('registrarVehiculo', compact('vehiculo'));
     }

	public function guardar(Request $datos) {
         
         $vehiculo = new Vehiculo();
         $vehiculo->tipo=$datos->input('tipo');
         $vehiculo->save();
         
         return redirect('consultarVehiculos');

   }

  public function editar($id) {

    $vehiculo = DB::table('vehiculo')
    ->where('id', $id)
    ->select('vehiculo.*')
    ->first();

    return view('editarVehiculo', compact('vehiculo'));

  }

  public function actualizar(Request $datos, $id) {

    $vehiculo = Vehiculo::find($id);
    $vehiculo->tipo=$datos->input('tipo');
    $vehiculo->save();

    return redirect('consultarVehiculos');

  }

	public function consultar() {
      	$vehiculo=DB::table('vehiculo')
        ->select('vehiculo.*', 'id', 'tipo')
        ->get();

      return view('consultarVehiculos', compact('vehiculo'));

   }

   public function eliminar($id) {
      
      $vehiculo = Vehiculo::find($id);
      $vehiculo->delete();
      
      return redirect('consultarVehiculos');

   }

}
