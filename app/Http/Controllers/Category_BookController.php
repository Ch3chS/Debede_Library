<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category_Book;

class Category_BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_books = Category_Book::all();
        if($category_books->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran relaciones libro-categoria',
            ]);
        }
        return response($category_books, 200);
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
                'id_category' => 'required|exists:categories,id',
                'id_book' => 'required|exists:books,id',
            ],
            [
                'id_category.required' => 'Debe ingresar una categoria',
                'id_category.exists' => 'La categoria ingresada no existe',
                'id_book.required' => 'Debe ingresar un libro',
                'id_book.exists' => 'El libro ingresado no una existe',
            ]
        );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $newCategory_Book = new Category_Book();
        $newCategory_Book->id_category = $request->id_category;
        $newCategory_Book->id_book = $request->id_book;
        $newCategory_Book->save();
        
        return response() -> json([
            'respuesta' => 'Se ha agregado una relacion libro-categoria',
            'id' => $newCategory_Book->id,
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
        $category_book = Category_Book::find($id);
        if(empty($category_book)){
            return response()->json([
                'respuesta' => 'la relacion libro-categoria no se encuentra'
            ]);
        }
        return response($category_book, 200);;
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
                'id_category' => 'required|exists:categories,id',
                'id_book' => 'required|exists:books,id',
            ],
            [
                'id_category.required' => 'Debe ingresar una categoria',
                'id_category.exists' => 'La categoria ingresada no existe',
                'id_book.required' => 'Debe ingresar un libro',
                'id_book.exists' => 'El libro ingresado no una existe',
            ]
        );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        
        $category_book = Category_Book::find($id);

        if(empty($category_book)){
            return response()->json([
                'respuesta' => 'La relacion usuario-libro no se encuentra'
            ]);
        }

        $category_book->id_category = $request->id_category;
        $category_book->id_book = $request->id_book;
        $category_book->save();
        
        return response() -> json([
            'respuesta' => 'Se ha actualizado la relacion usuario-libro',
            'id' => $category_book->id,
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
        $category_book = Category_Book::find($id);

        if(empty($category_book)){
            return response()->json([
                'respuesta' => 'La relacion libro-categoria no se encuentra'
            ]);
        }

        $category_book->delete();

        return response() -> json([
            'respuesta' => 'Se ha desactivado la relacion libro-categoria',
            'id' => $category_book->id,
        ], 200);
    }
}
