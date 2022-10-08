<?php

namespace App\Http\Controllers\Abstractions;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Abstractions\IController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Repository\Abstractions\ARepository;
use App\Models\Abstractions\AEntity;

abstract class AController extends Controller implements IController
{
    private ARepository $_repository;

    public function __construct(ARepository $repository)
    {
        $this->_repository  = $repository;
    }
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        try
        {
            return response()->json([
                'message'   => 'Lista com todos os registros.',
                'item'      => $this->_repository->index()
            ], Response::HTTP_OK);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'message' => 'Ocorreu um erro.', 
                'error' => $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request): JsonResponse
    {
        try
        {
            return response()->json([
                'message'   => 'Exibir registro: ' . $request->id,
                'item'      => $this->_repository->show($request)
            ], Response::HTTP_OK);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'message' => 'Ocorreu um erro.', 
                'error' => $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        try
        {
            return response()->json([
                'message'   => 'Registro salvo.',
                'item'      => $this->_repository->store($request)
            ], Response::HTTP_OK);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'message' => 'Campos do registro inválidos.',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        try
        {
            return response()->json([
                'message'   => 'Registro atualizado.',
                'item'      => $this->_repository->update($request)
            ], Response::HTTP_OK);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'message' => 'Registro não encontrado.', 
                'error' => $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {
        try
        {
            return response()->json([
                'message'   => 'Registro deletado.',
                'item'      => $this->_repository->destroy($request)
            ], Response::HTTP_OK);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'message' => 'Registro não encontrado.', 
                'error' => $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        }
    }
}
