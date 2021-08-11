<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function index() :JsonResponse{

        return response()->json($this->repository->get());
    }
    public function store(RegisterUserRequest $request): JsonResponse{
        $user = $this->repository->store($request->validated());
        return response()->json($user);
    }
    public function show($id){
        $user = $this->repository->show($id);
        return response()->json($user);
    }
    public function update(UpdateUserRequest $request , $id): JsonResponse{
        $user = $this->repository->update($id,$request->validated());
        return  response()->json($user);
    }
    public function delete($id) : JsonResponse{
        $this->repository->delete($id);
        return  response()->json(true);

    }
}
