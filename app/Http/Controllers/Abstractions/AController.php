<?php

namespace App\Http\Controllers\Abstractions;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Abstractions\IController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

abstract class AController extends Controller implements IController
{
    private ARepository $_repository;
    private Request $_request;
    private Response $_response;
    private int $_id;

    public function __construct(
        Request $request, 
        Response $response,
        ARepository $repository,
        int $id
    )
    {
        $this->_repository  = $repository;
        $this->_request     = $request;
        $this->_response    = $response;
        $this->_id          = $id;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): array
    {
        try
        {
            return response()->json([
                'message'   => 'Lista com todos os registros.',
                'item'      => $this->_repository->index()
            ], $this->_response->HTTP_OK);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'message' => 'Ocorreu um erro.', 
                'error' => $e->getMessage()
            ], $this->_response->HTTP_NOT_FOUND);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(): array
    {
        try
        {
            return response()->json([
                'message'   => 'Exibir registro: ' . $this->_id,
                'item'      => $this->_repository->show($this->_id)
            ], $this->_response->HTTP_OK);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'message' => 'Ocorreu um erro.', 
                'error' => $e->getMessage()
            ], $this->_response->HTTP_NOT_FOUND);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): array
    {
        try
        {
            return response()->json([
                'message'   => 'Registro salvo.',
                'item'      => $this->_repository->store($this->_request)
            ], $this->_response->HTTP_OK);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'message' => 'Campos do registro inválidos.',
                'error' => $e->getMessage()
            ], $this->_response->HTTP_INTERNAL_SERVER_ERROR);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(): array
    {
        try
        {
            return response()->json([
                'message'   => 'Registro atualizado.',
                'item'      => $this->_repository->update($this->_request, $this->_id)
            ], $this->_response->HTTP_OK);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'message' => 'Registro não encontrado.', 
                'error' => $e->getMessage()
            ], $this->_response->HTTP_NOT_FOUND);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(): array
    {
        try
        {
            return response()->json([
                'message'   => 'Registro deletado.',
                'item'      => $this->_repository->destroy($this->_id)
            ], $this->_response->HTTP_OK);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'message' => 'Registro não encontrado.', 
                'error' => $e->getMessage()
            ], $this->_response->HTTP_NOT_FOUND);
        }
    }
}
