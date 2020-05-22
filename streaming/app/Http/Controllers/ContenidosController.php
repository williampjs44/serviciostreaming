<?php

namespace App\Http\Controllers;

use App\Contenidos;
use App\Comentarios;
use App\User;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Storage;

class ContenidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validamos los campos
        $this->validate($request, [
        'titulo' => 'required|max:255',
        'descripcion' => 'max:500',
        'URL' => 'max:255',
        'tipo'    => 'required|max:10'
        ]);

        //Recuperamos los datos de la request
        $data = $request->all();

        //Recuperamos archivo adjunto
        if($request->hasFile('archivo')) {
            // Get filename with extension           
            $filenameWithExt = $request->file('archivo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
           // Get just ext
            $extension = $request->file('archivo')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
          // Upload Image
            $path = $request->file('archivo')->storeAs('public/uploads', $fileNameToStore);
            $data['archivo']= $fileNameToStore;
        }
        else{
            $data['archivo']= "no-image.jpg";
        }
            
        //Guardamos a la base de datos
        Contenidos::create($data);
        //Ha ido bien pintamos el mensaje a la pantalla
        Session::flash('flash_message', 'Contenido creado correctamente!');
        //Volvemos a la pagina de perfil
        return redirect()->to('perfil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contenidos  $contenidos
     * @return \Illuminate\Http\Response
     */
    public function show($id_contenido)
    {
        $contenido = Contenidos::where('id_contenido', $id_contenido)->firstOrFail();
       // $comentarios = Comentarios::where('id_contenido', $id_contenido)->get();
       $comentarios = \DB::table('comentarios')
       ->leftjoin('users','comentarios.id_user', '=', 'users.id')
       ->where('comentarios.id_contenido','=',$id_contenido)
       ->select('comentarios.*', 'users.name')
       ->get();
        return view('contenidoshow', compact('contenido', 'comentarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contenidos  $contenidos
     * @return \Illuminate\Http\Response
     */
    public function edit($id_contenido)
    {
        $data = Contenidos::where('id_contenido', $id_contenido)->firstOrFail();
        return view('contenidoedit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contenidos  $contenidos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_contenido)
    {
        //Validamos los campos
        $this->validate($request, [
        'titulo' => 'required|max:255',
        'descripcion' => 'max:500',
        'URL' => 'max:255',
        'archivo' => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts,jpg,png,gif',
        'tipo'    => 'required|max:10'
        ]);

        //Recuperamos los datos de la request
        $data = $request->all();

        //Recuperamos archivo adjunto
        if($request->hasFile('archivo')) {
            // Get filename with extension           
            $filenameWithExt = $request->file('archivo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
            // Get just ext
            $extension = $request->file('archivo')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
            // Upload Image
            $path = $request->file('archivo')->storeAs('public/uploads', $fileNameToStore);
            $data['archivo']= $fileNameToStore;
        }
        else{
            $data['archivo']= "no-image.jpg";
        }
            
        //Guardamos a la base de datos
        $contenido = Contenidos::where('id_contenido', $id_contenido)->firstOrFail();
        $contenido->fill($data)->save();

        //Ha ido bien pintamos el mensaje a la pantalla
        Session::flash('flash_message', 'Contenido modificado correctamente!');
        //Volvemos a la pagina de perfil
        return redirect()->to('perfil');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contenidos  $contenidos
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Contenidos $contenidos)
    // {
    //     $contenidos->delete();
    //     return redirect()->to('home');
    // }
    public function destroy($id_contenido)
  {
    //Primero busco el contenido de $id_contenido
    $contenido = Contenidos::where('id_contenido', $id_contenido)->firstOrFail();
    //Borrar archivos fisicos
    if (isset($contenido['archivo']) && $contenido['archivo'] != "no-image.jpg"){
        unlink(public_path('storage/uploads/'.$contenido['archivo']));
    }

    $contenido->delete();

    Session::flash('flash_message', 'contenido eliminado correctamente!');

    return redirect()->to('perfil');
  }

  // Contendios del usuario

  public function showall($id_user){
    //contenido del usuario
    $datas = \DB::table('contenidos')
    ->where('contenidos.id_user','=',$id_user)
    ->get();
    
    //datos del usuario
    $user = User::where('id', $id_user)->firstOrFail();

   //$datas = Contenidos::where ('id_user',$id);
   //Para ver los datos
   //dd($datas);
   return view('contenidoperfil', compact('datas','user'));

  }

}
