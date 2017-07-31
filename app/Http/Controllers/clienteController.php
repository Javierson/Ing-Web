<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class clienteController extends Controller
{

    public function registrar() {
        $perfil=User::all();
        return view('registrarCliente', compact('perfil'));
     }

	public function guardar(Request $datos) {
         
        $cliente = new User();
        $cliente->name=$datos->input('nombre');
        $cliente->apellido_paterno=$datos->input('ap');
        $cliente->apellido_materno=$datos->input('am');
        $cliente->fecha_de_nacimiento=$datos->input('fn');
        $cliente->codigo_postal=$datos->input('cp');
        $cliente->email=$datos->input('email');
        $cliente->save();

        return redirect('consultarClientes');

    }

	public function consultar() {

		$cliente = DB::table('users')
        ->select('users.*', 'users.id AS id', 'name', 'fecha_de_nacimiento AS fn', 'email', 'rol')
        ->where([
            ['users.id', '>', '0'],
            ['users.rol', null],
            ])->get();        

      	return view('consultarClientes', compact('cliente'));

   }

   public function eliminar($id){
      
      $cliente = User::find($id);
      $cliente->delete();
      
      return redirect('consultarClientes');

   }

}
