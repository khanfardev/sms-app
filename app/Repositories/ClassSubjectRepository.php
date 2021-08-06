<?php

namespace App\Repositories;

use App\Models\StudentClass;
use App\Models\TuitionFeeCategory;
use App\Models\TuitionFeeCategoryAmount;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TuitionFeeAmountRepository implements TuitionFeeAmountRepositoryInterface
{
    private TuitionFeeCategoryAmount $tuitionFeeCategoryAmount;

    public function __construct(TuitionFeeCategoryAmount $tuitionFeeCategoryAmount)
    {
        $this->tuitionFeeCategoryAmount = $tuitionFeeCategoryAmount;
    }


    public function get()
    {
        return $this->tuitionFeeCategoryAmount->paginate(10);
    }
    public function getByCategoryDetails($category_id){
        return $this->tuitionFeeCategoryAmount->where('category_id',$category_id)->get();
    }
    public function show($id)
    {
        return $this->tuitionFeeCategoryAmount->find($id);
    }

    public function store($data)
    {
        return $this->tuitionFeeCategoryAmount->create($data);
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
