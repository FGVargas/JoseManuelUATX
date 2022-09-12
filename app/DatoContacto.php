<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatoContacto extends Model
{
    //
    protected $table = 'datocontacto';

    protected $fillable = [
        'id',
        'empleado_id',
        'nombre_contacto',
        'email',
        'telefono',
        'direccion',
        'ciudad',
        'estado',
        'cp',
        'principal',
        'eliminado'
    ];
}
