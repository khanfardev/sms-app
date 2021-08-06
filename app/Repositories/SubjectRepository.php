<?php

namespace App\Repositories;

use App\Models\Subject;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SubjectRepository implements SubjectRepositoryInterface
{
    private Subject $subject;

    public function __construct(Subject $subject)
    {
        $this->subject = $subject;
    }


    public function get()
    {
        return $this->subject->paginate(10);
    }

    public function show($id)
    {
        return $this->subject->find($id);
    }

    public function store($data)
    {
        return $this->subject->create($data);
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
