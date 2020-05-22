<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restricciones extends Model
{
    //
    protected $table = 'restricciones';
    protected $primaryKey = 'id_restriccion'; 
    protected $fillable = ['id_contenido', 'tiempo', 'id_propietario', 'id_userbaneado'];
}