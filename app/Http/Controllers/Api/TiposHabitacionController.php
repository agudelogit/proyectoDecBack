<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\tipo_habitacion;
use Illuminate\Http\Request;

class TiposHabitacionController extends Controller
{
    public function index()
    {
        $tipo_habitacions = tipo_habitacion::all();
        return $tipo_habitacions;
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
   
    public function destroy($id)
    {
        //
    }
}
