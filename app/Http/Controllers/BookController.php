<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        if($books->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran libros',
            ]);
        }
        return view('store',compact('books'));
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
                'title' => 'required|max:100',
                'link' => 'required',
                'publication_date' => 'required',
                'autor' => 'required|max:100',
            ],
            [
                'title.required' => 'Debes ingresar el titulo del libro',
                'title.max' => 'El titulo del libro no debe exeder los 100 caracteres',
                'publication_date.required' => 'Debe ingresar la fecha de publicacion del libro',
                'link.required' => 'Debes ingresar un link hacia el libro',
                'autor.required' => 'Debes ingresar el nombre del autor del libro',
                'autor.max' => 'El nombre del autor no debe exeder los 100 caracteres',
            ]
        );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $newBook = new Book();
        $newBook->title = $request->title;
        $newBook->link = $request->link;
        $newBook->publication_date = $request->publication_date;
        $newBook->autor = $request->autor;
        $newBook->save();
        
        /*
        return response() -> json([
            'respuesta' => 'Se ha agregado un nuevo libro',
            'id' => $newBook->id,
        ], 201);
        */

        return redirect('/store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        if(empty($book)){
            return response()->json([
                'respuesta' => 'El libro no se encuentra'
            ]);
        }
        return view('book', compact('book'));
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
                'title' => 'required|max:100',
                'link' => 'required',
                'publication_date' => 'required',
                'autor' => 'required|max:100',
            ],
            [
                'title.required' => 'Debes ingresar el titulo del libro',
                'title.max' => 'El titulo del libro no debe exeder los 100 caracteres',
                'publication_date.required' => 'Debe ingresar la fecha de publicacion del libro',
                'link.required' => 'Debes ingresar un link hacia el libro',
                'autor.required' => 'Debes ingresar el nombre del autor del libro',
                'autor.max' => 'El nombre del autor no debe exeder los 100 caracteres',
            ]
        );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $book = Book::find($id);

        if(empty($book)){
            return response()->json([
                'respuesta' => 'El libro no se encuentra'
            ]);
        }
        
        $book->title = $request->title;
        $book->link = $request->link;
        $book->publication_date = $request->publication_date;
        $book->autor = $request->autor;
        $book->save();
        
        return response() -> json([
            'respuesta' => 'El libro ha sido actualizado',
            'id' => $book->id,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        if(empty($book)){
            return response()->json([
                'respuesta' => 'El libro no se encuentra'
            ]);
        }

        $book->delete();

        return response() -> json([
            'respuesta' => 'Se ha desactivado el libro',
            'id' => $book->id,
        ], 200);
    }
}
