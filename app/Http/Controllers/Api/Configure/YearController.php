<?php

namespace App\Http\Controllers\Api\Configure;

use App\Http\Requests\Configure\Years\StoreYearsRequest;
use App\Http\Requests\Configure\Years\UpdateYearsRequest;
use App\Models\Year;
use App\Repositories\YearsRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class YearController extends Controller
{
    private $repository;

    public function __construct(YearsRepositoryInterface $repository)
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


    public function store(StoreYearsRequest $request):JsonResponse
    {
        $years =$this->repository->store($request->validated());
        return response()->json($years);

    }


    public function show($id) : JsonResponse
    {
        return response()->json($this->repository->show($id));
    }


    public function edit(Year $year)
    {
        //
    }


    public function update(UpdateYearsRequest $request, $id) :JsonResponse
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
