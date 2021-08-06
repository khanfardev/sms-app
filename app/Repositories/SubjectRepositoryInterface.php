<?php

namespace App\Repositories;

interface TypeExamRepositoryInterface
{
    public function get();
    public function show($id);
    public function store($data);
    public function update($id, $data);
    public function delete($id);

}
