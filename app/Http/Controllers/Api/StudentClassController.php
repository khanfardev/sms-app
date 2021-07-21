<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Student\Classes\StoreStudentClassesRequest;
use App\Http\Requests\Student\Classes\UpdateStudentClassesRequest;
use App\Models\StudentClass;
use App\Repositories\StudentClassesRepository;
use App\Repositories\StudentClassesRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentClassController extends Controller
{
    private $repository;

    public function __construct(StudentClassesRepositoryInterface $repository)
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


    public function store(StoreStudentClassesRequest $request):JsonResponse
    {
        $studentClass=$this->repository->store($request->validated());
        return response()->json($studentClass);

    }


    public function show($id) : JsonResponse
    {
        return response()->json($this->repository->show($id));
    }


    public function edit(StudentClass $studentClass)
    {
        //
    }


    public function update(UpdateStudentClassesRequest $request, $id) :JsonResponse
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
