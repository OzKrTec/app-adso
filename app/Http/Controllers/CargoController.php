<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cargo;

class CargoController extends Controller
{
    //

    public function getData(Request $request){

        $cargo= Cargo::all();


        return response()->json([
            'status' => '200',
            'message' => 'data..',
            'result'=> $cargo
        ]);
    }
    public function getDataById(Request $request){

        $cargo= Cargo::where('id',$request->id)->get();

        return response()->json([
            'status' => '200',
            'message' => 'data..',
            'result'=> $cargo
        ]);
    }

    public function save(Request $request){

        $cargo=Cargo::create([
            'nombre'=>$request->nombre,
            'salario'=> $request->salario,
            'id_area'=> $request->id_area,
        ]);

        return response()->json([
            'status' => '200',
            'message' => 'guardado con exito',
            'data' => $cargo,

        ]);
    }

    public function update(Request $request){

        $cargo= Cargo::findOrFail($request->id);

        $cargo->update([
            'nombre'=>$request->nombre,
            'salario'=> $request->salario,
            'id_area'=> $request->id_area,
        ]);

        return response()->json([
            'status' => '200',
            'message' => 'actualizado con exito',
        ]);
    }

    public function delete(Request $request){

        $cargo= Cargo::findOrFail($request->id);
        $cargo->delete();


        return response()->json([
            'status' => '200',
            'message' => 'Se elimino con exito',
        ]);
    }



}
