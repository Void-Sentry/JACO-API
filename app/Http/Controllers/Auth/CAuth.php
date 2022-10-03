<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CAuth extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        try
        {
            $user = User::where('email', $request->email)->first();
            Hash::check($request->password, $user->password);

            return response()->json([
                'message' => 'Autenticado', 
                'user' => $user, 
                'token' => $user->createToken('token')->plainTextToken
            ]);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'message' => 'Usuário ou senha não encontrados.', 
                'error' => $e->getMessage()]
            );
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        try
        {
            $request['password'] = Hash::make($request->password);
            $user = User::create($request->all());

            return response()->json([
                'message' => 'Usuário registrado.'
            ]);
        }
        catch(\Eception $e)
        {
            return response()->json([
                'message' => 'Usuário ou senha inválidos ou já existem.', 
                'error' => $e->getMessage()]
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        return auth('sanctum')->user()->tokens()->delete();
    }
}
