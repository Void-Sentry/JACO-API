<?php

namespace App\Http\Controllers\Abstractions;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Abstractions\IController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Service\Abstractions\IService;
use App\Models\Abstractions\AEntity;

abstract class AController extends Controller implements IController
{
    private IService $_service;

    public function __construct(IService $service)
    {
        $this->_service  = $service;
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
                'status'    => Response::HTTP_OK,
                'message'   => 'Lista com todos os registros.',
                'item'      => $this->_service->index()
            ], Response::HTTP_OK);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'status'    => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message'   => 'Ocorreu um erro.', 
                'error'     => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
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
                'status'    => Response::HTTP_FOUND,
                'message'   => 'Exibir registro: ' . $request->id,
                'item'      => $this->_service->show($request)
            ], Response::HTTP_FOUND);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'status'    => Response::HTTP_NOT_FOUND,
                'message'   => 'Ocorreu um erro.', 
                'error'     => $e->getMessage()
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
                'status'    => Response::HTTP_CREATED,
                'message'   => 'Registro salvo.',
                'item'      => $this->_service->store($request)
            ], Response::HTTP_CREATED);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'status'    => Response::HTTP_BAD_REQUEST,
                'message'   => 'Campos do registro inválidos.',
                'error'     => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
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
                'status'    => Response::HTTP_ACCEPTED,
                'message'   => 'Registro atualizado.',
                'item'      => $this->_service->update($request)
            ], Response::HTTP_ACCEPTED);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'status'    => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Registro não encontrado.', 
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
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
                'status'    => Response::HTTP_FOUND,
                'message'   => 'Registro deletado.',
                'item'      => $this->_service->destroy($request)
            ], Response::HTTP_FOUND);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'status'    => Response::HTTP_NOT_FOUND,
                'message' => 'Registro não encontrado.', 
                'error' => $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        }
    }
}
