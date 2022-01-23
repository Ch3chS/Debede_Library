<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        if($roles->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran roles',
            ]);
        }
        return response($roles, 200);
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
                'name' => 'required|max:20'
            ],
            [
                'name.required' => 'Debes ingresar el nombre del rol',
                'name.max' => 'El nombre del rol no debe exeder los 20 caracteres',
            ]
        );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $newRole = new Role();
        $newRole->name = $request->name;
        $newRole->save();
        
        return response() -> json([
            'respuesta' => 'Se ha agregado un rol',
            'id' => $newRole->id,
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
        $role = Role::find($id);
        if(empty($role)){
            return response()->json([
                'respuesta' => 'no se encuentra el rol'
            ]);
        }
        return response($role, 200);;
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
                'name' => 'required|max:20'
            ],
            [
                'name.required' => 'Debes ingresar el nombre del rol',
                'name.max' => 'El nombre del rol no debe exeder los 20 caracteres',
            ]
        );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $role = Role::find($id);

        if(empty($role)){
            return response()->json([
                'respuesta' => 'El rol no se encuentra'
            ]);
        }

        $role->name = $request->name;
        $role->save();
        
        return response() -> json([
            'respuesta' => 'Se ha actualizado el rol',
            'id' => $role->id,
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
        $role = Role::find($id);

        if(empty($role)){
            return response()->json([
                'respuesta' => 'El rol no se encuentra'
            ]);
        }

        $role->delete();

        return response() -> json([
            'respuesta' => 'Se ha desactivado el rol',
            'id' => $role->id,
        ], 200);
    }
}
