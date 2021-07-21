<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Student\Groups\StoreGroupRequest;
use App\Http\Requests\Student\Groups\UpdateGroupRequest;
use App\Models\StudentGroup;
use App\Repositories\StudentGroupRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentGroupController extends Controller
{
    private $repository;

    public function __construct(StudentGroupRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function index(): JsonResponse
    {
        $data = $this->repository->get();
        return response()->json($data);
    }


    public function create()
    {
        //
    }


    public function store(StoreGroupRequest $request):JsonResponse
    {
        $studentClass=$this->repository->store($request->validated());
        return response()->json($studentClass);

    }


    public function show($id) : JsonResponse
    {
        return response()->json($this->repository->show($id));
    }


    public function edit(StudentGroup $studentGroup)
    {
        //
    }


    public function update(UpdateGroupRequest $request, $id) :JsonResponse
    {
        $this->repository->update($id,$request->validated());
        return response()->json("Updated successfully");
    }


    public function destroy($id)
    {
        $this->repository->delete($id);
        return response()->json("Deleted successfully");

    }
}
