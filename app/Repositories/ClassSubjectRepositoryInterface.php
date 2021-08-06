<?php

namespace App\Repositories;

interface ClassSubjectRepositoryInterface
{
    public function get();
    public function geClassIdDetails($class_id);
    public function show($id);
    public function store($data);
    public function update($id, $data);
    public function delete($id);

}
