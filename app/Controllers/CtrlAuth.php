<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use App\Validators\LoginValidation; 

class CtrlAuth extends BaseController
{
    public function index()
    {
        return view("pages/auth/index"); 
    }

    public function signup() {
        return view("pages/auth/signup"); 
    } 

    public function login(){
        try {
            $userData = $this->request->getPost(); 
            $loginValidator = new LoginValidation(); 
            $loginValidator->validateInputs($userData); 

            $user = (new User())->where('userName', $userData['user'])->first(); 
            $loginValidator->validateCredentials($user, $userData['password']); 

            session()->set('user', [
                'userId' => $user['userId'], 
                'userName' => $user['userName']
            ]); 

        } catch (\Throwable $th) {
            return redirect()->back()->withInput(); 
        }

        return redirect()->to('/user'); 
    }
}
