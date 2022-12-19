<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tip_hab_acom extends Model
{
    use HasFactory;
    protected $fillable = ['id_hotel','id_tipo_habitacion','id_acomodacion','num_habitaciones'];
}
