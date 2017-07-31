<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Sucursal;
use DB;

class sucursalController extends Controller
{

	public function registrar() {

         $empresa = DB::table('empresa')
         ->select('empresa.*')
         ->where('id', 1)
         ->get();

         return view('registrarSucursal', compact('empresa'));
     }

	public function guardar(Request $datos) {
         
         $sucursal = new Sucursal();
         $sucursal->numero=$datos->input('numero');
         $sucursal->calle=$datos->input('calle');
         $sucursal->cp=$datos->input('cp');
         $sucursal->colonia=$datos->input('colonia');
         $sucursal->municipio=$datos->input('municipio');
         $sucursal->estado=$datos->input('estado');
         $sucursal->empresa_id=$datos->input('empresa');
         $sucursal->save();
         
         return redirect('consultarSucursales');

   }

	public function consultar() {

      	$sucursal=DB::table('sucursal')
        ->join('empresa', 'sucursal.empresa_id', '=', 'empresa.id')
        ->select('sucursal.*', 'numero', 'mision', 'vision', 'nombre', 'sucursal.id as id')
        ->get();

      return view('consultarSucursales', compact('sucursal'));

    }

    public function editar($id) {

    $empresa = DB::table('empresa')
    ->select('empresa.*')
    ->where('id', 1)
    ->get();

    $sucursal=DB::table('sucursal')
    ->where('id', $id)
    ->select('sucursal.*')
    ->first();

    return view('editarSucursal', compact('empresa', 'sucursal'));

    }

    public function actualizar(Request $datos, $id) {

    $sucursal = Sucursal::find($id);
    $sucursal->numero=$datos->input('numero');
    $sucursal->calle=$datos->input('calle');
    $sucursal->cp=$datos->input('cp');
    $sucursal->colonia=$datos->input('colonia');
    $sucursal->municipio=$datos->input('municipio');
    $sucursal->estado=$datos->input('estado');
    $sucursal->empresa_id=$datos->input('empresa');
    $sucursal->save();

    return redirect('consultarSucursales');

  }

   public function eliminar($id) {
      
      $sucursal = Sucursal::find($id);
      $sucursal->delete();
      
      return redirect('consultarSucursales');

   }

}
