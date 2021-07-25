<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Student\TuitionFeeCategory\StoreTuitionFeeCategoryRequest;
use App\Http\Requests\Student\TuitionFeeCategory\UpdateTuitionFeeCategoryRequest;
use App\Http\Requests\Student\TuitionFeeCategoryAmount\StoreTuitionFeeCategoryAmountRequest;
use App\Models\TuitionFeeCategoryAmount;
use App\Repositories\TuitionFeeAmountRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TuitionFeeCategoryAmountController extends Controller
{
    private $repository;

    public function __construct(TuitionFeeAmountRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function index(): JsonResponse
    {
        $data = $this->repository->get();
        return response()->json($data);
    }
    public function getDetails($category_id){
        return response()->json($this->repository->getByCategoryDetails($category_id));
    }

    public function create()
    {
        //
    }


    public function store(StoreTuitionFeeCategoryAmountRequest $request):JsonResponse
    {
        $amount=$this->repository->store($request->validated());
        return response()->json($amount);

    }


    public function show($id) : JsonResponse
    {
        return response()->json($this->repository->show($id));
    }


    public function edit(TuitionFeeCategoryAmount $tuitionFeeCategoryAmount)
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
