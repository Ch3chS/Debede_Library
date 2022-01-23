<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;¡
use App\Models\Region_Book;
use Illuminate\Support\Facades\Validator;

class Region_BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $region_books = Region_Book::all();
        if($region_books->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran relaciones libro-region',
            ]);
        }
        return response($region_books, 200);
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
                'id_region' => 'required|exists:regions,id',
                'id_book' => 'required|exists:books,id',
                'id_clasification' => 'required|exists:clasifications,id',
            ],
            [
                'id_region.required' => 'Debe ingresar una region',
                'id_region.exists' => 'La region ingresada no existe',
                'id_book.required' => 'Debe ingresar un libro',
                'id_book.exists' => 'El libro ingresado no una existe',
                'id_clasification.required' => 'Debe ingresar una clasificacion',
                'id_clasification.exists' => 'La clasificacion ingresada no existe',
            ]
        );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $newRegion_Book = new Region_Book();
        $newRegion_Book->id_region = $request->id_region;
        $newRegion_Book->id_book = $request->id_book;
        $newRegion_Book->id_clasification = $request->id_clasification;
        $newRegion_Book->save();
        
        return response() -> json([
            'respuesta' => 'Se ha agregado una relacion region-libro',
            'id' => $newRegion_Book->id,
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
        $region_book = Region_Book::find($id);
        if(empty($region_book)){
            return response()->json([
                'respuesta' => 'la relacion region-libro no se encuentra'
            ]);
        }
        return response($region_book, 200);;
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
                'id_region' => 'required|exists:regions,id',
                'id_book' => 'required|exists:books,id',
                'id_clasification' => 'required|exists:clasifications,id',
            ],
            [
                'id_region.required' => 'Debe ingresar una region',
                'id_region.exists' => 'La region ingresada no existe',
                'id_book.required' => 'Debe ingresar un libro',
                'id_book.exists' => 'El libro ingresado no una existe',
                'id_clasification.required' => 'Debe ingresar una clasificacion',
                'id_clasification.exists' => 'La clasificacion ingresada no existe',
            ]
        );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        
        $region_book = Region_Book::find($id);

        if(empty($region_book)){
            return response()->json([
                'respuesta' => 'La relacion region-libro no se encuentra'
            ]);
        }

        $region_book->id_region = $request->id_region;
        $region_book->id_book = $request->id_book;
        $region_book->id_clasification = $request->id_clasification;
        $region_book->save();
        
        return response() -> json([
            'respuesta' => 'Se ha actualizado la relacion region-libro',
            'id' => $region_book->id,
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
        $region_book = Region_Book::find($id);

        if(empty($region_book)){
            return response()->json([
                'respuesta' => 'La relacion region-libro no se encuentra'
            ]);
        }

        $region_book->delete();

        return response() -> json([
            'respuesta' => 'Se ha desactivado la relacion region-libro',
            'id' => $region_book->id,
        ], 200);
    }
}
