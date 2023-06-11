<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'pedido';

    // Nombre de la clave primaria en la tabla
    protected $primaryKey = 'id';

    // Columnas que se pueden llenar masivamente
    protected $fillable = [
        'fecha_yhora',
        'id_cuenta',
        'id_mesa',
    ];

    public function getIdCuenta()
    {
        return $this->id_cuenta;
    }
}
