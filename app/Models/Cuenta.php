<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
     // Nombre de la tabla en la base de datos
     protected $table = 'cuenta';

     // Nombre de la clave primaria en la tabla
     protected $primaryKey = 'id';
 
     // Columnas que se pueden llenar masivamente
     protected $fillable = [
         'total',
     ];
 
     public function getIdCuenta()
     {
         return $this->id;
     }
}
