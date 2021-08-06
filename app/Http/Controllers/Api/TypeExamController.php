<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Student\TypeExams\StoreTypeExamRequest;
use App\Http\Requests\Student\TypeExams\UpdateTypeExamsRequest;
use App\Models\TypeExam;
use App\Repositories\TypeExamRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeExamController extends Controller
{
    private $repository;

    public function __construct(TypeExamRepositoryInterface $repository)
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


    public function store(StoreTypeExamRequest $request):JsonResponse
    {
        $studentClass=$this->repository->store($request->validated());
        return response()->json($studentClass);

    }


    public function show($id) : JsonResponse
    {
        return response()->json($this->repository->show($id));
    }


    public function edit(TypeExam $typeExam)
    {
        //
    }


    public function update(UpdateTypeExamsRequest $request, $id) :JsonResponse
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
