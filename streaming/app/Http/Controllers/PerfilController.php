<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contenidos;
use App\User;
use Auth;

class PerfilController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user()->id;
         $datas = \DB::table('contenidos')
         ->where('contenidos.id_user','=',$id)
         ->get();
        //$datas = Contenidos::where ('id_user',$id);
        //Para ver los datos
        //dd($datas);
        return view('perfil', compact('datas'));
    }

    public function search(Request $request)
    {
         //Validamos los campos
         $this->validate($request, [
            'nombre' => 'required|max:255',
            ]);
        //Busqueda de usuarios
        $name ='%'.$request->input('nombre').'%';
         $datas = \DB::table('users')
         ->where('users.name','like',$name)
         ->get();
        //$datas = Contenidos::where ('id_user',$id);
        //Para ver los datos
        //dd($datas);
        return view('searchusuarios', compact('datas'));
    }
}
