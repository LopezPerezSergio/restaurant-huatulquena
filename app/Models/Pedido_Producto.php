<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido_Producto extends Model
{
    protected $table = 'pedido_producto';
    protected $primaryKey = 'id';
    // public $timestamps = false;

    protected $fillable = [
        'cantidad',
        'descripcion',
        'id_pedido',
        'id_producto',
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'id_pedido');
    }
}
