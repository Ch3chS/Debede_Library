<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        if($users->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran usuarios',
            ]);
        }
        return response($users, 200);
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
                'nickname' => 'required|min:1|max:30',
                'birth_date' => 'required',
                'password' => 'required',
                'email' => 'required|min:5|max:100',
                'id_region' => 'required|exists:regions,id',
                'id_role' => 'required|exists:roles,id',
            ],
            [
                'nickname.required' => 'Debes ingresar un nombre de usuario',
                'nickname.max' => 'El nombre de usuario no debe exeder los 30 caracteres',
                'nickname.min' => 'El nombre de usuario debe tener almenos 1 caracter',
                'birth_date.required' => 'Debe ingresar la fecha de nacimiento del usuario',
                'name.required' => 'Debes ingresar un nombre de usuario',
                'password.required' => 'Debes ingresar una contraseña',
                'email.required' => 'Debes ingresar un correo electronico',
                'email.max' => 'El correo no debe exeder los 100 caracteres',
                'email.min' => 'El correo ingresado no puede ser valido',
                'id_region.required' => 'Debe ingresar una region',
                'id_region.exists' => 'La region ingresada no existe',
                'id_role.required' => 'Debe ingresar un rol',
                'id_role.exists' => 'El rol ingresado no existe',
            ]
        );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $newUser = new User();
        $newUser->nickname = $request->nickname;
        $newUser->birth_date = $request->birth_date;
        $newUser->password = $request->password;
        $newUser->email = $request->email;
        $newUser->id_region = $request->id_region;
        $newUser->id_role = $request->id_role;
        $newUser->save();
        
        return response() -> json([
            'respuesta' => 'Se ha agregado un nuevo usuario',
            'id' => $newUser->id,
        ], 201);
        
        /*return view('login',compact('newUser'));*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if(empty($user)){
            return response()->json([
                'respuesta' => 'El usuario no se encuentra'
            ]);
        }
        return response($user, 200);;
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
                'nickname' => 'required|min:1|max:30',
                'birth_date' => 'required',
                'password' => 'required',
                'email' => 'required|min:5|max:100',
                'id_region' => 'required|exists:regions,id',
                'id_role' => 'required|exists:roles,id',
            ],
            [
                'nickname.required' => 'Debes ingresar un nombre de usuario',
                'nickname.max' => 'El nombre de usuario no debe exeder los 30 caracteres',
                'nickname.min' => 'El nombre de usuario debe tener almenos 1 caracter',
                'birth_date.required' => 'Debe ingresar la fecha de nacimiento del usuario',
                'name.required' => 'Debes ingresar un nombre de usuario',
                'password.required' => 'Debes ingresar una contraseña',
                'email.required' => 'Debes ingresar un correo electronico',
                'email.max' => 'El correo no debe exeder los 100 caracteres',
                'email.min' => 'El correo ingresado no puede ser valido',
                'id_region.required' => 'Debe ingresar una region',
                'id_region.exists' => 'La region ingresada no existe',
                'id_role.required' => 'Debe ingresar un rol',
                'id_role.exists' => 'El rol ingresado no existe',
            ]
        );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $user = User::find($id);

        if(empty($user)){
            return response()->json([
                'respuesta' => 'El usuario no se encuentra'
            ]);
        }
        
        $user->nickname = $request->nickname;
        $user->birth_date = $request->birth_date;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->id_region = $request->id_region;
        $user->id_role = $request->id_role;
        $user->save();
        
        return response() -> json([
            'respuesta' => 'El usuario ha sido actualizado',
            'id' => $user->id,
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
        $user = User::find($id);

        if(empty($user)){
            return response()->json([
                'respuesta' => 'El usuario no se encuentra'
            ]);
        }

        $user->delete();

        return response() -> json([
            'respuesta' => 'Se ha desactivado el usuario',
            'id' => $user->id,
        ], 200);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }
        return $credentials;
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }
}

