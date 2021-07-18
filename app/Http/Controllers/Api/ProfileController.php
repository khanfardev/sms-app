<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileUserRequest;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function show() :JsonResponse{
       $current_user = $this->repository->show(auth()->user()->id);
        return response()->json($current_user);
    }
    public function update(UpdateProfileUserRequest $request):JsonResponse{
        $user = $this->repository->update(auth()->user()->id,$request->validated());

        return response()->json($user);

    }


}
