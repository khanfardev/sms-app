<?php

namespace App\Repositories;

use App\Models\StudentClass;
use App\Models\StudentGroup;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentGroupRepository implements StudentGroupRepositoryInterface
{
    private StudentGroup $studentGroup;

    public function __construct(StudentGroup $studentGroup)
    {
        $this->studentGroup = $studentGroup;
    }


    public function get()
    {
        return $this->studentGroup->paginate(10);
    }

    public function show($id)
    {
        return $this->studentGroup->find($id);
    }

    public function store($data)
    {
        return $this->studentGroup->create($data);
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
