<?php

namespace App\Repositories;

use App\Models\StudentClass;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentClassesRepository implements StudentClassesRepositoryInterface
{
    private StudentClass $studentClass;

    public function __construct(StudentClass $studentClass)
    {
        $this->studentClass = $studentClass;
    }


    public function get()
    {
        return $this->studentClass->paginate(10);
    }

    public function show($id)
    {
        return $this->studentClass->find($id);
    }

    public function store($data)
    {
        return $this->studentClass->create($data);
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
