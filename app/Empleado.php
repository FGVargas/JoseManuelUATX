<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleado';

    protected $fillable = [
        'id',
        'nombre',
        'paterno',
        'materno',
        'email',
        'nacimiento',
        'direccion',
        'genero',
        'telefono',
        'salario',
        'tipo_moneda',
        'codigo_empleado',

    ];

    public function datosContacto()
    {
        return $this->hasMany('App\DatoContacto','empleado_id','id');
    }
}
