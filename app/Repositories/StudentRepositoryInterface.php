<?php

namespace App\Repositories;

interface StudentRepositoryInterface
{
    public function get();
    public function getStudentWithClass($class_id , $year_id);
    public function show($id);
    public function store($id);
    public function update($id, $data);
    public function delete($id);

}
