<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\hotel;

class HotelController extends Controller
{
    //Enlista y devuelve todos los hoteles
    public function index()
    {
        $hotels = hotel::all();
        return $hotels;
    }

    //Crea un nuevo hotel
    public function store(Request $request)
    {
        $hotel = new hotel();

        // Control de error
        // Se verifica existencia de nit para evitar duplicidad
        $hotelExist = hotel::where('nit_hotel', $request->nit_hotel)->first();

        // En caso de existir devolvemos un error
        if( $hotelExist ){
            // message 2, duplicidad
            return response()->json([
                'success' => false,
                'message' => 2
            ]);
        }
        
        $hotel->nit_hotel = $request->nit_hotel;
        $hotel->nombre_hotel = $request->nombre_hotel;
        $hotel->direccion_hotel = $request->direccion_hotel;
        $hotel->telefono_hotel = $request->telefono_hotel;
        $hotel->ciudad_hotel = $request->ciudad_hotel;
        $hotel->descripcion_hotel = $request->descripcion_hotel;
        $hotel->numero_habitaciones_hotel = $request->numero_habitaciones_hotel;
        $hotel->id_usuario = $request->id_usuario;

        try {
            $hotel->save();

            return response()->json([
                'success' => true,
                'message' => $hotel
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
        $hotel = hotel::find($id);
        return $hotel;
    }

    public function update(Request $request, $id)
    {
        $hotel = hotel::findOrFail($request->id);
        $hotel->nit_hotel = $request->nit_hotel;
        $hotel->nombre_hotel = $request->nombre_hotel;
        $hotel->direccion_hotel = $request->direccion_hotel;
        $hotel->telefono_hotel = $request->telefono_hotel;
        $hotel->ciudad_hotel = $request->ciudad_hotel;
        $hotel->descripcion_hotel = $request->descripcion_hotel;
        $hotel->numero_habitaciones_hotel = $request->numero_habitaciones_hotel;
        $hotel->id_usuario = $request->id_usuario;
        
        try {
            $hotel->save();

            return response()->json([
                'success' => true,
                'message' => $hotel
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $hotel = hotel::destroy($id);

            if($hotel == 1){
                return response()->json([
                    'success' => true,
                    'message' => $hotel
                ]);
            }else{
                return response()->json([
                    'success' => false,
                    'message' => 2
                ]);    
            }
            
        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
