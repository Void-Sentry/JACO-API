<?php 

namespace App\Http\Controllers;

use App\Repository\Abstractions\IRepositories\IFriend as RIFriend;
use App\Http\Controllers\Abstractions\IControllers\IFriend;
use App\Http\Controllers\Abstractions\IController;
use App\Http\Controllers\Abstractions\AController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Repository\RFriend;

final class CFriend extends AController implements IFriend
{
    private RIFriend $_interface;

    public function __construct(RIFriend $interface)
    {
        $this->_interface = $interface;
        parent::__construct($interface);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function auth_user_list_friends(int $id): JsonResponse
    {
        try
        {
            return response()->json([
                'status'    => Response::HTTP_OK,
                'message'   => 'Lista com todos os amigos do usuário autenticado.',
                'item'      => $this->_interface->auth_user_list_friends($id)
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function pending(int $id): JsonResponse
    {
        try
        {
            return response()->json([
                'status'    => Response::HTTP_OK,
                'message'   => 'Lista com as solicitações de amizade recebidas.',
                'item'      => $this->_interface->pending($id)
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function accept_friend(int $id): JsonResponse
    {
        try
        {
            return response()->json([
                'status'    => Response::HTTP_OK,
                'message'   => 'Pedido de amizade aceito.',
                'item'      => $this->_interface->accept_friend($id)
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
}