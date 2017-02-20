<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'inventario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cantidad', 'producto'];

    public function nombreProducto()
    {
        return $this->hasOne('App\Productos', 'id', 'producto');
    }
}
