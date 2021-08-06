<?php

namespace App\Repositories;

use App\Models\ClassSubject;
use App\Models\StudentClass;
use App\Models\TuitionFeeCategory;
use App\Models\TuitionFeeCategoryAmount;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ClassSubjectRepository implements ClassSubjectRepositoryInterface
{
    private ClassSubject $classSubject;

    public function __construct(ClassSubject $classSubject)
    {
        $this->classSubject = $classSubject;
    }


    public function get()
    {
        return $this->classSubject->paginate(10);
    }

    public function geClassIdDetails($class_id)
    {
        return $this->classSubject->where('class_id',$class_id)->get();
    }
    public function show($id)
    {
        return $this->classSubject->find($id);
    }

    public function store($data)
    {
        return $this->classSubject->create($data);
    }

    public function update($id, $data)
    {
        return $this->show($id)->update($data);
    }



    public function delete($id)
    {
        return $this->show($id)->delete();
    }



}
