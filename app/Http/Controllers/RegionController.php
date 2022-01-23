<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use Illuminate\Support\Facades\Validator;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $region = Region::all();
        if($region->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran regiones',
            ]);
        }
        return response($region, 200);
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
                'id_country' => 'required|exists:countries,id',
            ],
            [
                'name.required' => 'Debes ingresar el nombre de la region',
                'name.max' => 'El nombre de la region no debe exeder los 40 caracteres',
                'id_country.required' => 'Debe ingresar un pais',
                'id_country.exists' => 'El pais ingresado no existe',
            ]
        );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $newRegion = new Region();
        $newRegion->name = $request->name;
        $newRegion->id_country = $request->id_country;
        $newRegion->save();
        
        return response() -> json([
            'respuesta' => 'Se ha agregado una region',
            'id' => $newRegion->id,
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
        $region = Region::find($id);
        if(empty($region)){
            return response()->json([
                'respuesta' => 'no se encuentra la region'
            ]);
        }
        return response($region, 200);;
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
                'id_country' => 'required|exists:countries,id',
            ],
            [
                'name.required' => 'Debes ingresar el nombre de la region',
                'name.max' => 'El nombre de la region no debe exeder los 40 caracteres',
                'id_country.required' => 'Debe ingresar un pais',
                'id_country.exists' => 'El pais ingresado no existe',
            ]
        );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $region = Region::find($id);

        if(empty($region)){
            return response()->json([
                'respuesta' => 'La region no se encuentra'
            ]);
        }

        $region->name = $request->name;
        $region->id_country = $request->id_country;
        $region->save();
        
        return response() -> json([
            'respuesta' => 'Se ha actualizado la region',
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
        $region = Region::find($id);

        if(empty($region)){
            return response()->json([
                'respuesta' => 'La region no se encuentra'
            ]);
        }

        $region->delete();

        return response() -> json([
            'respuesta' => 'Se ha desactivado la region',
            'id' => $region->id,
        ], 200);
    }
}
