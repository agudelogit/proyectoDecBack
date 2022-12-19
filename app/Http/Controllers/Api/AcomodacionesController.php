<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\acomodacion;
use Illuminate\Http\Request;

class AcomodacionesController extends Controller
{
    
    public function index()
    {
        $acomodacions = acomodacion::all();
        return $acomodacions;
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
