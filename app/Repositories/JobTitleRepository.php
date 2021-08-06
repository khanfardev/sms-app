<?php

namespace App\Repositories;

use App\Models\JobTitle;
use App\Models\StudentClass;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class JobTitleRepository implements JobTitleRepositoryInterface
{
    private JobTitle $jobTitle;

    public function __construct(JobTitle $jobTitle)
    {
        $this->jobTitle = $jobTitle;
    }


    public function get()
    {
        return $this->jobTitle->paginate(10);
    }

    public function show($id)
    {
        return $this->jobTitle->find($id);
    }

    public function store($data)
    {
        return $this->jobTitle->create($data);
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
