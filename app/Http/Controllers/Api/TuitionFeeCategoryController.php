<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\TuitionFeeCategory\StoreTuitionFeeCategoryRequest;
use App\Http\Requests\Student\TuitionFeeCategory\UpdateTuitionFeeCategoryRequest;
use App\Models\TuitionFeeCategory;
use App\Repositories\TuitionFeeCategoryRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TuitionFeeCategoryController extends Controller
{
    private $repository;

    public function __construct(TuitionFeeCategoryRepositoryInterface $repository)
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


    public function store(StoreTuitionFeeCategoryRequest $request):JsonResponse
    {
        $studentClass=$this->repository->store($request->validated());
        return response()->json($studentClass);

    }


    public function show($id) : JsonResponse
    {
        return response()->json($this->repository->show($id));
    }


    public function edit(TuitionFeeCategory $tuitionFeeCategory)
    {
        //
    }


    public function update(UpdateTuitionFeeCategoryRequest $request, $id) :JsonResponse
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
