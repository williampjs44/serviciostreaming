<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenidos extends Model
{
    //
    protected $table = 'contenidos';
    protected $primaryKey = 'id_contenido'; 
    protected $fillable = ['titulo', 'descripcion', 'URL', 'archivo', 'tipo', 'id_user'];
}