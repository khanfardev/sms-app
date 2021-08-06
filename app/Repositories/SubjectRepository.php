<?php

namespace App\Repositories;

use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\TypeExam;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TypeExamRepository implements TypeExamRepositoryInterface
{
    private TypeExam $typeExam;

    public function __construct(TypeExam $typeExam)
    {
        $this->typeExam = $typeExam;
    }


    public function get()
    {
        return $this->typeExam->paginate(10);
    }

    public function show($id)
    {
        return $this->typeExam->find($id);
    }

    public function store($data)
    {
        return $this->typeExam->create($data);
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
