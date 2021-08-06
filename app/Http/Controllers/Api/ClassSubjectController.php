<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Student\ClassSubjects\StoreClassSubjectRequest;
use App\Http\Requests\Student\ClassSubjects\UpdateClassSubjectRequest;
use App\Models\ClassSubject;
use App\Repositories\ClassSubjectRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassSubjectController extends Controller
{
    private $repository;

    public function __construct(ClassSubjectRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function index(): JsonResponse
    {
        $data = $this->repository->get();
        return response()->json($data);
    }
    public function getDetails($class_id) : JsonResponse{
        return response()->json($this->repository->geClassIdDetails($class_id));
    }

    public function create()
    {
        //
    }


    public function store(StoreClassSubjectRequest $request):JsonResponse
    {
        $amount=$this->repository->store($request->validated());
        return response()->json($amount);

    }


    public function show($id) : JsonResponse
    {
        return response()->json($this->repository->show($id));
    }


    public function edit(ClassSubject $classSubject)
    {
        //
    }


    public function update(UpdateClassSubjectRequest $request, $id) :JsonResponse
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
