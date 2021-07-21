<?php

namespace App\Repositories;

use App\Models\StudentShift;

class StudentShiftRepository implements StudentShiftRepositoryInterface
{
    private StudentShift $studentShift;

    public function __construct(StudentShift $studentShift)
    {
        $this->studentShift = $studentShift;
    }


    public function get()
    {
        return $this->studentShift->paginate(10);
    }

    public function show($id)
    {
        return $this->studentShift->find($id);
    }

    public function store($data)
    {
        return $this->studentShift->create($data);
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
