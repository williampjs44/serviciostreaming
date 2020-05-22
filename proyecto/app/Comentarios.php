<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    //
    protected $table = 'comentarios';
    protected $primaryKey = 'id_comentario'; 
    protected $fillable = ['comentario', 'estado', 'id_contenido', 'id_usuario'];
}