<?php 

namespace App\Http\Controllers;

use App\Service\Abstractions\IServices\IChatPrivate as SIChatPrivate;
use App\Http\Controllers\Abstractions\IControllers\IChatPrivate;
use App\Http\Controllers\Abstractions\AController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

final class CChatPrivate extends AController implements IChatPrivate
{
    private SIChatPrivate $_service;
    private Request $_request;

    public function __construct(Request $request, SIChatPrivate $service)
    {
        $this->_request = $request;
        $this->_service = $service;
        parent::__construct($service);
    }

    public function list_chats_from_user_authenticated(): JsonResponse
    {
        return response()->json([
            'item' => $this->_request->all(),
            'message' => 'teste'
        ], 200);
        try
        {
            return response()->json(
                [
                    'message'   => 'Lista com os amigos do usuário autenticado',
                    'items'     => $this->_service->list_chats_from_user($this->_request->friends)
                ], Response::HTTP_OK
            );
        }
        catch(\Exeception $e)
        {
            return response()->json(
                [
                    'message' => $e->getMessage()
                ],
                Response::HTTP_NOT_FOUND
            );
        }
    }
}