<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->userService->getAllUsers());
    }

    public function show(int $id): JsonResponse
    {
        $user = $this->userService->getUserById($id);
        return $user ? response()->json($user) : response()->json(['message' => 'Usuário não encontrado'], 404);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email'
        ]);

        return response()->json($this->userService->createUser($data), 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $id
        ]);

        $user = $this->userService->updateUser($id, $data);
        return $user ? response()->json($user) : response()->json(['message' => 'Usuário não encontrado'], 404);
    }

    public function destroy(int $id): JsonResponse
    {
        return $this->userService->deleteUser($id)
            ? response()->json(['message' => 'Usuário deletado com sucesso'])
            : response()->json(['message' => 'Usuário não encontrado'], 404);
    }
}
