<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        if($categories->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran categoria',
            ]);
        }
        return response($categories, 200);
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
                'name' => 'required|max:100'
            ],
            [
                'name.required' => 'Debes ingresar el nombre de la categoria',
                'name.max' => 'El nombre de la categoria no debe exeder los 100 caracteres',
            ]
        );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $newCategory = new Category();
        $newCategory->name = $request->name;
        $newCategory->save();
        
        return response() -> json([
            'respuesta' => 'Se ha agregado una categoria',
            'id' => $newCategory->id,
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
        $category = Category::find($id);
        if(empty($category)){
            return response()->json([
                'respuesta' => 'no se encuentra la categoria'
            ]);
        }
        return response($category, 200);;
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
                'name' => 'required|max:100'
            ],
            [
                'name.required' => 'Debes ingresar el nombre de la categoria',
                'name.max' => 'El nombre de la categoria no debe exeder los 100 caracteres',
            ]
        );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $category = Category::find($id);

        if(empty($category)){
            return response()->json([
                'respuesta' => 'La categoria no se encuentra'
            ]);
        }

        $category->name = $request->name;
        $category->save();
        
        return response() -> json([
            'respuesta' => 'Se ha actualizado la categoria',
            'id' => $category->id,
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
        $category = Category::find($id);

        if(empty($category)){
            return response()->json([
                'respuesta' => 'La categoria no se encuentra'
            ]);
        }

        $category->delete();

        return response() -> json([
            'respuesta' => 'Se ha desactivado la categoria',
            'id' => $category->id,
        ], 200);
    }
}
