<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    public function get();
    public function show($id);
    public function store($id);
    public function update($id, $data);
    public function disabled($id);
    public function delete($id);
    public function getUserByEmail($email);
    public function UserUpdatePassword($data);

}
