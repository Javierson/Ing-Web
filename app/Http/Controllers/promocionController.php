<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promocion;
use App\Sucursal;
use DB;

class promocionController extends Controller
{

    public function registrar() {
        $sucursal=Sucursal::all();
        return view('registrarPromocion', compact('sucursal'));
     }

	public function guardar(Request $datos) {
         
        $promocion = new Promocion();
        $promocion->nombre=$datos->input('nombre');
        $promocion->descripcion=$datos->input('descripcion');
        $promocion->fecha_de_inicio=$datos->input('fi');
        $promocion->fecha_de_expiracion=$datos->input('fe');
        $promocion->descuento=$datos->input('descuento');
        $promocion->privacidad=$datos->input('privacidad');
        $promocion->sucursal_id=$datos->input('sucursal');
        $promocion->save();

        return redirect('consultarPromociones');

     }

	public function consultar() {

		$promocion=DB::table('promocion')
        ->join('sucursal', 'promocion.sucursal_id', '=', 'sucursal.id')
        ->select('promocion.*', 'nombre', 'descripcion', 'fecha_de_inicio AS fi', 'fecha_de_expiracion AS fe', 'descuento', 'privacidad', 'numero', 'calle', 'colonia')
        ->get();

      return view('consultarPromociones', compact('promocion'));

   }

    public function editar($id) {

    $sucursal = Sucursal::all();

    $promocion = DB::table('promocion')
    ->where('id', $id)
    ->select('promocion.*', 'nombre', 'descripcion', 'fecha_de_inicio', 'fecha_de_expiracion', 'descuento', 'privacidad')
    ->first();

    return view('editarPromocion', compact('sucursal', 'promocion'));

  }

  public function actualizar(Request $datos, $id) {

    $promocion = Promocion::find($id);
    $promocion->nombre=$datos->input('nombre');
    $promocion->descripcion=$datos->input('descripcion');
    $promocion->fecha_de_inicio=$datos->input('fi');
    $promocion->fecha_de_expiracion=$datos->input('fe');
    $promocion->descuento=$datos->input('descuento');
    $promocion->privacidad=$datos->input('privacidad');
    $promocion->sucursal_id=$datos->input('sucursal');
    $promocion->save();

    return redirect()->back();

  }

   public function eliminar($id){
      
      $promocion = Promocion::find($id);
      $promocion->delete();
      
      return redirect('consultarPromociones');

   }

}
