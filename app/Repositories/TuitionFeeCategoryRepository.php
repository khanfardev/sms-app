<?php

namespace App\Repositories;

use App\Models\StudentClass;
use App\Models\TuitionFeeCategory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TuitionFeeCategoryRepository implements TuitionFeeCategoryRepositoryInterface
{
    private TuitionFeeCategory $tuitionFeeCategory;

    public function __construct(TuitionFeeCategory $tuitionFeeCategory)
    {
        $this->tuitionFeeCategory = $tuitionFeeCategory;
    }


    public function get()
    {
        return $this->tuitionFeeCategory->paginate(10);
    }

    public function show($id)
    {
        return $this->tuitionFeeCategory->find($id);
    }

    public function store($data)
    {
        return $this->tuitionFeeCategory->create($data);
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
