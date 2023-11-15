<?php

namespace App\Validators;

use App\Errors\InvalidDataInputException;
use App\Validators\BaseValidation;

class LoginValidation extends BaseValidation
{
    protected $validationRules = [
        'user' => 'required|alpha_space', 
        'password' => 'required',
    ];

    protected $validationMessages = [
        'user' => [
            'required' => 'El nombre de usaurio es obligatorio', 
            'alpha_space' => 'El nombre contiene caracteres invalidos'
        ], 
        'password' => [
            'required' => 'La contraseña es obligatoria', 
        ]
    ];

    public function validateCredentials($user, $password)
    {
        if(!$user || !password_verify($password, $user["password"])) {
            $this->validator->setError('password', "El usuario y/o contraseña son incorrectos"); 
            throw new InvalidDataInputException('Usuario y/o contraseña incorrectos', $this->validator->getErrors()); 
        }
        return true;
    }
}
