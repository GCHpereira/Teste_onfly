<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\TravelOrder;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class TravelOrderController extends Controller
{
   /**
     * Retorna uma lista paginada de usuários.
     *
     * Este método recupera uma lista paginada de usuários do banco de dados
     * e a retorna como uma resposta JSON.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $travelOrders = Auth::user()->travelOrders;
        return response()->json($travelOrders,200);
    }

    // Criar um novo pedido
    public function store(Request $request)
    {
        $validated = $request->validate([
            'requester_name'=> 'required|string|max:255',
            'destination'=> 'required|string|max:255',
            'departure_date'=> 'required|date',
            "return_date"=> 'required|date|after_or_equal:departure_date',
        ]);

        $travelOrder = new TravelOrder();
        $travelOrder->requester_name = $validated['requester_name'];
        $travelOrder->destination = $validated['destination'];
        $travelOrder->departure_date = $validated['departure_date'];
        $travelOrder->return_date = $validated['return_date'];
        $travelOrder->user_id = auth()->id();
        $travelOrder->status = 'solicitado';

        $travelOrder->save();

        return response()->json(['message' => 'Pedido de viagem criado com sucesso!', 'data' => $travelOrder], 201);
    }


    //Exibir um pedido específico
    public function show($id)
    {
        $travelOrder = Auth::user()->travelOrders()->find($id);

        if (!$travelOrder){
            return response()->json(['message'=> 'Pedido não encontrado'], 400);
        }
    }

    // Atualizar um pedido
    public function update(Request $request, TravelOrder $travelOrder): JsonResponse
    {

        if ($travelOrder->status === 'aprovado') {
            return response()->json(['message' => 'Pedidos aprovados não podem ser editados'], 403);
        }

        if ($travelOrder->user_id !== Auth::id()) {
            return response()->json(['message' => 'Pedido não encontrado ou você não tem permissão para editá-lo'], 403);
        }

        $validated = $request->validate([
            'requester_name' => 'string|max:255',
            'destination' => 'string|max:255',
            'departure_date' => 'date',
            'return_date' => 'date|after_or_equal:departure_date',
            'status' => 'in:aprovado,rejeitado',
        ]);

        $travelOrder->update($validated);

        return response()->json([
            'message' => 'Pedido editado com sucesso',
            'data' => $travelOrder
        ], 200);
    }


        // Deletar um pedido
        public function destroy($id)
    {
        $travelOrder = Auth::user()->travelOrders()->find($id);

        if (!$travelOrder) {
            return response()->json(['message' => 'Pedido não encontrado'], 404);
        }

        if ($travelOrder->status === 'aprovado') {
            return response()->json(['message' => 'Pedidos aprovados não podem ser deletados'], 403);
        }

        $travelOrder->delete();
        return response()->json(['message' => 'Pedido deletado com sucesso'], 200);

    }


}
