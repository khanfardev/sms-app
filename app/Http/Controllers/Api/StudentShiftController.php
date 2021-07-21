<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Student\Shifts\StoreShiftRequest;
use App\Http\Requests\Student\Shifts\UpdateShiftRequest;
use App\Models\StudentShift;
use App\Repositories\StudentShiftRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentShiftController extends Controller
{
    private $repository;

    public function __construct(StudentShiftRepositoryInterface $repository)
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


    public function store(StoreShiftRequest $request):JsonResponse
    {
        $studentClass=$this->repository->store($request->validated());
        return response()->json($studentClass);

    }


    public function show($id) : JsonResponse
    {
        return response()->json($this->repository->show($id));
    }


    public function edit(StudentShift $studentShift)
    {
        //
    }


    public function update(UpdateShiftRequest $request, $id) :JsonResponse
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
