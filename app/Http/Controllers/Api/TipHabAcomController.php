<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\hotel;
use App\Models\tip_hab_acom;
use Illuminate\Http\Request;

class TipHabAcomController extends Controller
{

    public function index()
    {
    }

    public function store(Request $request)
    {
        $tip_hab_acom = new tip_hab_acom();
        $hotel = hotel::where('id', $request->id_hotel)->first();

        $tipExiste = tip_hab_acom::where('id_hotel', $request->id_hotel)
            ->where('id_tipo_habitacion', $request->id_tipo_habitacion)
            ->where('id_acomodacion', $request->id_acomodacion)
            ->first();

        $habitacionesTHA =  tip_hab_acom::selectRaw(' SUM(num_habitaciones) as total ')
            ->where('id_hotel', $request->id_hotel)
            ->value('total');

        $sumaTotal = $habitacionesTHA + $request->num_habitaciones;
        if ($sumaTotal > $hotel->numero_habitaciones_hotel) {
            // message 3, el request excede las habitaciones del hotel
            return response()->json([
                'success' => false,
                'message' =>  3
            ]);
        }

        if ($request->num_habitaciones == 0) {
            // message 2, duplicidad
            return response()->json([
                'success' => false,
                'message' => 0
            ]);
        }

        // En caso de existir devolvemos un error
        if ($tipExiste) {
            // message 2, duplicidad
            return response()->json([
                'success' => false,
                'message' => 2
            ]);
        }




        $tip_hab_acom->id_hotel = $request->id_hotel;
        $tip_hab_acom->id_tipo_habitacion = $request->id_tipo_habitacion;
        $tip_hab_acom->id_acomodacion = $request->id_acomodacion;
        $tip_hab_acom->num_habitaciones = $request->num_habitaciones;

        try {
            $tip_hab_acom->save();

            return response()->json([
                'success' => true,
                'message' => $tip_hab_acom
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function show($id)
    {
        $tip_hab_acoms = tip_hab_acom::all();

        $tip_hab_acoms = tip_hab_acom::select(['tip_hab_acoms.id', 'tip_hab_acoms.num_habitaciones', 'tipo_habitacions.descripcion_tipo_habitacion', 'acomodacions.descripcion_acomodacion'])
            ->join('tipo_habitacions', 'tipo_habitacions.id', '=', 'tip_hab_acoms.id_tipo_habitacion')
            ->join('acomodacions', 'acomodacions.id', '=', 'tip_hab_acoms.id_acomodacion')
            ->where('id_hotel', $id)
            ->get();

        return $tip_hab_acoms;
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
