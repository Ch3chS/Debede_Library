<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        if($countries->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran paises',
            ]);
        }
        return response($countries, 200);
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
            ],
            [
                'name.required' => 'Debes ingresar el nombre del pais',
                'name.max' => 'El nombre del pais no debe exeder los 40 caracteres',
            ]
        );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $newCountry = new Country();
        $newCountry->name = $request->name;
        $newCountry->save();
        
        return response() -> json([
            'respuesta' => 'Se ha agregado un pais',
            'id' => $newCountry->id,
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
        $country = Country::find($id);
        if(empty($country)){
            return response()->json([
                'respuesta' => 'no se encuentra el pais'
            ]);
        }
        return response($country, 200);;
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
            ],
            [
                'name.required' => 'Debes ingresar el nombre del pais',
                'name.max' => 'El nombre del pais no debe exeder los 40 caracteres',
            ]
        );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $country = Country::find($id);

        if(empty($country)){
            return response()->json([
                'respuesta' => 'El pais no se encuentra'
            ]);
        }

        $country->name = $request->name;
        $country->save();
        
        return response() -> json([
            'respuesta' => 'Se ha actualizado el pais',
            'id' => $country->id,
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
        $country = Country::find($id);

        if(empty($country)){
            return response()->json([
                'respuesta' => 'El pais no se encuentra'
            ]);
        }

        $country->delete();

        return response() -> json([
            'respuesta' => 'Se ha desactivado el pais',
            'id' => $country->id,
        ], 200);
    }
}
