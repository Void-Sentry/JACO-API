<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CAuth extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        try
        {
            $user = User::where('mail', $request->mail)->first();
            Hash::check($request->pass, $user->pass);

            return response()->json([
                'status'    =>  Response::HTTP_CONTINUE,
                'message'   =>  'Autenticado', 
                'item'      =>  [
                    'user'      =>  $user,
                    'token'     =>  $user->createToken('token')->plainTextToken
                ]
            ]);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'status'    => Response::HTTP_BAD_REQUEST,
                'message'   => 'Usuário ou senha não encontrados.', 
                'error'     => $e->getMessage()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request): JsonResponse
    {
        try
        {
            $request['pass'] = Hash::make($request->pass);
            $user = User::create($request->all());

            return response()->json([
                'status'    =>  Response::HTTP_CREATED,
                'message'   =>  'Usuário registrado.',
                'item'      =>  $user
            ]);
        }
        catch(\Eception $e)
        {
            return response()->json([
                'status'    => Response::HTTP_BAD_REQUEST,
                'message'   => 'Usuário ou senha inválidos ou já existem.', 
                'error'     => $e->getMessage()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(): JsonResponse
    {
        try
        {
            return response()->json([
                'status'    =>  Response::HTTP_OK,
                'message'   =>  'Token invalidado.',
                'item'      =>  auth('sanctum')->user()->tokens()->delete()
            ]);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'status'    => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message'   => $e->getMessage()
            ]);
        }
        
    }
}
