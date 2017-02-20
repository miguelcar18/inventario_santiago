<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ventas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cantidad', 'producto', 'cliente', 'apartar'];

    public function nombreProducto()
    {
        return $this->hasOne('App\Productos', 'id', 'producto');
    }

    public function nombreCliente()
    {
        return $this->hasOne('App\Clientes', 'id', 'cliente');
    }
}
