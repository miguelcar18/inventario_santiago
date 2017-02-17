<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clientes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'apellido', 'telefono', 'correo', 'cedula'];
}
