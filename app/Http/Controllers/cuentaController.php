<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cuenta;
use App\Paquete;
use App\Vehiculo;
use App\Promocion;
use App\Sucursal;
use App\Evaluacion;
use DB;

class cuentaController extends Controller
{

    public function registrar() {

        $paquete = DB::table('paquete')
        ->join('vehiculo', 'paquete.vehiculo_id', '=', 'vehiculo.id')
        ->select('paquete.*', 'paquete.id AS id', 'nombre', 'costo', 'tipo')
        ->get();

        $cliente=User::all();

        $promocion=Promocion::all();

        $sucursal=Sucursal::all();

        return view('registrarCuenta', compact('paquete', 'promocion', 'sucursal', 'cliente'));

     }

     public function Customer() {
        $datos = User::all();
        return response()->json(
            $datos->toArray()
            );
    }

	public function guardar(Request $datos) {
	    
        $cuenta = new Cuenta();
        $cuenta->sucursal_id=$datos->input('sucursal');
        $cuenta->cliente_id=$datos->input('nc');
        $cuenta->costo=$datos->input('costo');
        $cuenta->paquete_id=$datos->input('paquete');
        $cuenta->save();

        // Si el campo puntos es direfente de nulo y de administrador
        if ( ! $datos->input('lp') == '' and ! $datos->input('lp') == 0 and auth()->user()->id != $datos->input('nc'))
            $usuario = User::find($datos->input('nc'));

        // Si el metodo de pago es en efectivo aumentas los puntos
        if ($datos->input('payment') == 1) {
            $usuario->puntos+=$datos->input('lp'); }
        else { // Si no lo es restas el costo a los puntos
            $usuario = User::find($datos->input('nc'));
            $usuario->puntos-=$datos->input('costo'); }

        $usuario->save();

        return redirect('consultarCuentas');

    }

	public function consultar() {

        $cuenta = DB::table('cuenta')
        ->join('paquete', 'cuenta.paquete_id', '=', 'paquete.id')
        ->join('users', 'cuenta.cliente_id', '=', 'users.id')
        ->join('sucursal', 'cuenta.sucursal_id', '=', 'sucursal.id')
        ->select('cuenta.*', 'cuenta.id AS orden', 'cuenta.costo AS costo', 'users.name AS cliente', 'paquete.nombre AS paquete', 'cuenta.created_at AS fecha', 'numero', 'calle', 'colonia')
        ->orderBy('cuenta.id', 'desc')
        ->get();

        $evaluacion = DB::table('evaluacion')
        ->join('cuenta', 'evaluacion.cuenta_id', '=', 'cuenta.id')
        ->join('users', 'cuenta.cliente_id', '=', 'users.id')
        ->select('evaluacion.*', 'evaluacion.id AS id', 'calificacion', 'comentario', 'users.id AS idCliente', 'name', 'cuenta_id')
        ->orderBy('evaluacion.id', 'desc')
        ->get();

        return view('consultarCuentas', compact('cuenta', 'evaluacion'));

   }

   public function eliminar($id){
      
      $cuenta = Cuenta::find($id);
      $cuenta->delete();
      
      return redirect('consultarCuentas');

   }

}
