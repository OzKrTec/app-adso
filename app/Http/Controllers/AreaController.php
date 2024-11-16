<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    //

    public function getData(Request $request){

        $area= Area::all();

        return response()->json([
            'status' => '200',
            'message' => 'data..',
            'result'=> $area
        ]);
    }


    public function save(Request $request){

        $area=Area::create([
            'nombre'=>$request->nombre,
            'prueba'=>$request->prueba,
            'salario'=>$request->salario,
        ]);

        return response()->json([
            'status' => '200',
            'message' => 'guardado con exito',
            'data' => $area,

        ]);
    }
    }

