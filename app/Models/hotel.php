<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hotel extends Model
{
    use HasFactory;
    protected $fillable = ['nit_hotel','nombre_hotel','direccion_hotel','telefono_hotel','ciudad_hotel','descripcion_hotel','numero_habitaciones_hotel','id_usuario'];
}
