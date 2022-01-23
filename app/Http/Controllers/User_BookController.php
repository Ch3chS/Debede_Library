<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_Book;

class User_BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_books = User_Book::all();
        if($user_books->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran relaciones libro-usuario',
            ]);
        }
        return response($user_books, 200);
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
                'id_user' => 'required|exists:users,id',
                'id_book' => 'required|exists:books,id',
            ],
            [
                'id_user.required' => 'Debe ingresar un usuario',
                'id_user.exists' => 'El usuario ingresado no existe',
                'id_book.required' => 'Debe ingresar un libro',
                'id_book.exists' => 'El libro ingresado no una existe',
            ]
        );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $newUser_Book = new User_Book();
        $newUser_Book->id_user = $request->id_user;
        $newUser_Book->id_book = $request->id_book;
        $newUser_Book->save();
        
        return response() -> json([
            'respuesta' => 'Se ha agregado una relacion libro-usuario',
            'id' => $newUser_Book->id,
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
        $user_book = User_Book::find($id);
        if(empty($user_book)){
            return response()->json([
                'respuesta' => 'la relacion libro-usuario no se encuentra'
            ]);
        }
        return response($user_book, 200);;
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
                'id_user' => 'required|exists:users,id',
                'id_book' => 'required|exists:books,id',
            ],
            [
                'id_user.required' => 'Debe ingresar un usuario',
                'id_user.exists' => 'El usuario ingresado no existe',
                'id_book.required' => 'Debe ingresar un libro',
                'id_book.exists' => 'El libro ingresado no una existe',
            ]
        );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        
        $user_book = User_Book::find($id);

        if(empty($user_book)){
            return response()->json([
                'respuesta' => 'La relacion usuario-libro no se encuentra'
            ]);
        }

        $user_book->id_user = $request->id_user;
        $user_book->id_book = $request->id_book;
        $user_book->save();
        
        return response() -> json([
            'respuesta' => 'Se ha actualizado la relacion usuario-libro',
            'id' => $user_book->id,
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
        $user_book = User_Book::find($id);

        if(empty($user_book)){
            return response()->json([
                'respuesta' => 'La relacion usuario-libro no se encuentra'
            ]);
        }

        $user_book->delete();

        return response() -> json([
            'respuesta' => 'Se ha desactivado la relacion usuario-libro',
            'id' => $user_book->id,
        ], 200);
    }
}
