<?php

namespace App\Http\Controllers;

use App\Comentarios;
use Illuminate\Http\Request;

class ComentariosController extends Controller
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
            'comentarios' => 'required|max:255',
        ]);
    
        //Recuperamos los datos de la request
        $data = $request->all();
    
        //Recuperamos archivo adjunto
        $data['estado']= "aprobado";
                
        //Guardamos a la base de datos
        Comentarios::create($data);
        //Volvemos a la pagina del contenido
        return redirect()->to('contenidos/'.$data['id_contenido']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function show(Comentarios $comentarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentarios $comentarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comentarios $comentarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentarios $comentarios)
    {
        //
    }
}
