<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Retorna uma lista paginada de usuários.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $users = User::paginate(2);

        return response()->json([
            'status' => true,
            'users' => $users,
        ], 200);
    }
}