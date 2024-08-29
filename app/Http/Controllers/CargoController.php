<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    //

    public function getData(Request $request){

        $rta= 10+20;
        return response()->json([
            'status' => '200',
            'message' => 'data..',
            'result'=> $rta
        ]);
    }

    public function save(Request $request){

        if($request->edad>=18){
            $rta=' Mayor de edad ';
            return $request->nombre . $rta;
        }

        return response()->json([
            'status' => '200',
            'message' => 'guardado con exito',
            'data' => $request->nombre,

        ]);
    }

    public function update(Request $request){

        return response()->json([
            'status' => '200',
            'message' => 'actualizado con exito',
        ]);
    }

    public function delete(Request $request){

        return response()->json([
            'status' => '200',
            'message' => 'Se elimino con exito',
        ]);
    }



}
