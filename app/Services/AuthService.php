<?php


namespace App\Services;


use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    private $repo;

    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }

    public function login($data){
        if (Auth::attempt(['email' => $data['email'],'password' => $data['password']])){
            $user = $this->repo->getUserByEmail($data['email']);
            if($user->role('admin')){
                $token = $user->createToken('auth_token', ['*'] ?? null)->plainTextToken;
                return [
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                    'user' => $user,
                ];
            }elseif ($user->role('student')){
                return $user;
            }elseif ($user->role('teacher')){
                return $user;
            }
        return false;
        }
        return false;
    }

}
