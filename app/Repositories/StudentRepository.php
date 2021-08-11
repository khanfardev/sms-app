<?php

namespace App\Repositories;

use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentRepository implements StudentRepositoryInterface
{
    private Student $student;

    public function __construct(Student $student)
    {
        $this->student = $student;
    }


    public function get()
    {
        return $this->student->paginate(10);
    }
    public function getStudentWithClass($class_id, $year_id)
    {
        return $this->student->where('year_id',$year_id)->where('class_id',$class_id)->get();
    }

    public function show($id)
    {
        return $this->student->find($id);
    }

    public function store($data)
    {
        $student = $this->student->create($data);
        return $student;
    }

    public function update($id, $data)
    {
        $student = $this->show($id);
        $student->update($data);
        return $student;
    }



    public function delete($id)
    {
        $this->show($id)->delete();
        return true;
    }



}
