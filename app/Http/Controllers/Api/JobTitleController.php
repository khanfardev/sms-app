<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Student\JobTitles\StoreJobTitleRequest;
use App\Http\Requests\Student\JobTitles\UpdateJobTitleRequest;
use App\Models\JobTitle;
use App\Repositories\JobTitleRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobTitleController extends Controller
{
    private $repository;

    public function __construct(JobTitleRepositoryInterface $repository)
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


    public function store(StoreJobTitleRequest $request):JsonResponse
    {
        $studentClass=$this->repository->store($request->validated());
        return response()->json($studentClass);

    }


    public function show($id) : JsonResponse
    {
        return response()->json($this->repository->show($id));
    }


    public function edit(JobTitle $jobTitle)
    {
        //
    }


    public function update(UpdateJobTitleRequest $request, $id) :JsonResponse
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
