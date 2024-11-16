<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dpto;

class DptoController extends Controller
{
    //
    public function getData(Request $request){


        $dpto=Dpto::all();
        return response()->json([
            'status' => '200',
            'message' => 'data.. Dptos',
            'result'=> $dpto
        ]);
    }

    public function save(Request $request){

        $dpto=Dpto::create([
            'nombre'=>$request->nombre,
        ]);

        // $dpto= new Dpto();
        // $dpto->nombre= $request->nombre;
        // $dpto->save();

        return response()->json([
            'status' => '200',
            'message' => 'guardado con exito',
            'departamentos' => $dpto,

        ]);
    }

    public function update(Request $request){

        $dpto= Dpto::findOrFail($request->id);

        $dpto->update([
            'nombre'=>$request->nombre,
        ]);


        return response()->json([
            'status' => '200',
            'message' => 'actualizado con exito',
        ]);
    }

    public function delete(Request $request){

        $dpto= Dpto::findOrFail($request->id);
        $dpto->delete();

        return response()->json([
            'status' => '200',
            'message' => 'Se elimino con exito',
        ]);
    }
}
