<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clasification;
use Illuminate\Support\Facades\Validator;

class ClasificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clasification = Clasification::all();
        if($clasification->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran clasificaciones',
            ]);
        }
        return response($clasification, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:40'
                'age' => 'required|numeric',
            ],
            [
                'name.required' => 'Debes ingresar el nombre de la clasificacion',
                'name.max' => 'El nombre de la clasificacion no debe exeder los 40 caracteres',
                'age.required' => 'Debe ingresar la edad minima',
                'age.numeric' => 'La edad minima debe ser de tipo numerico',
            ]
        );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $newClasification = new Clasification();
        $newClasification->name = $request->name;
        $newClasification->age = $request->age;
        $newClasification->save();
        
        return response() -> json([
            'respuesta' => 'Se ha agregado una clasificacion',
            'id' => $newClasification->id,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clasification = Clasification::find($id);
        if(empty($clasification)){
            return response()->json([
                'respuesta' => 'no se encuentra la clasificacion'
            ]);
        }
        return response($clasification, 200);;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:40'
                'age' => 'required|numeric',
            ],
            [
                'name.required' => 'Debes ingresar el nombre de la clasificacion',
                'name.max' => 'El nombre de la clasificacion no debe exeder los 40 caracteres',
                'age.required' => 'Debe ingresar la edad minima',
                'age.numeric' => 'La edad minima debe ser de tipo numerico',
            ]
        );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $clasification = Clasification::find($id);

        if(empty($region)){
            return response()->json([
                'respuesta' => 'La clasificacion no se encuentra'
            ]);
        }

        $clasification->name = $request->name;
        $clasification->age = $request->age;
        $clasification->save();
        
        return response() -> json([
            'respuesta' => 'Se ha actualizado la clasificacion',
            'id' => $region->id,
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clasification = Clsification::find($id);

        if(empty($clasification)){
            return response()->json([
                'respuesta' => 'La clasificacion no se encuentra'
            ]);
        }

        $clasification->delete();

        return response() -> json([
            'respuesta' => 'Se ha desactivado la clasificacion',
            'id' => $clasification->id,
        ], 200);
    }
}
