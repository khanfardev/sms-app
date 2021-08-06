<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Student\Subjects\StoreSubjectRequest;
use App\Http\Requests\Student\Subjects\UpdateSubjectRequest;
use App\Models\Subject;
use App\Repositories\SubjectRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    private $repository;

    public function __construct(SubjectRepositoryInterface $repository)
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


    public function store(StoreSubjectRequest $request):JsonResponse
    {
        $studentClass=$this->repository->store($request->validated());
        return response()->json($studentClass);

    }


    public function show($id) : JsonResponse
    {
        return response()->json($this->repository->show($id));
    }


    public function edit(Subject $subject)
    {
        //
    }


    public function update(UpdateSubjectRequest $request, $id) :JsonResponse
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
