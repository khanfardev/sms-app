<?php

namespace App\Repositories;

interface TuitionFeeAmountRepositoryInterface
{
    public function get();
    public function getByCategoryDetails($category_id);
    public function show($id);
    public function store($data);
    public function update($id, $data);
    public function delete($id);

}
