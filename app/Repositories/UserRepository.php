<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserRepository implements UserRepositoryInterface
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function get()
    {
        return $this->user->role('admin')->paginate(10);
    }

    public function show($id)
    {
        return $this->user->find($id);
    }
    public function getUserByEmail($email){
        return $this->user->where('email', $email)->first();

    }
    public function store($data)
    {
        $data['password']     = Hash::make($data['password']);
        $user = $this->user->create($data);
        $user->assignRole($data['role']);
        return $user;
    }

    public function update($id, $data)
    {
        $user = $this->show($id);
        if(isset($data['password'])){
            $data['password']     = Hash::make($data['password']);

        }
        if(isset($data['role'])){
            $user->assignRole($data['role']);
        }
        $user->update($data);
        return $user;
    }

    public function disabled($user)
    {
        // TODO: Implement disabled() method.
    }

    public function delete($id)
    {
        $this->show($id)->delete();
        return true;
    }

    public function UserUpdatePassword($id,$data)
    {

    }
}
