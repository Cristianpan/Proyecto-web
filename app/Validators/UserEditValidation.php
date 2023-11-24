<?php

namespace App\Validators;
use App\Validators\BaseValidation;

class UserEditValidation extends BaseValidation
{
    protected $validationRules = [
        'imageProfile' => 'required_files',
        'imageBackground' => 'required_files',
        'occupationId' => 'required',
        'name' => 'required',
        'lastName' => 'required',
        'email' => 'required|valid_email',
        'cardNumber' => 'required',
    ];

    protected $validationMessages = [
        'name' => [
            'required' => 'El nombre es obligatorio.',
            'alpha_space' => 'El nombre no debe de contener caracteres especiales.',
        ],
        'lastName' => [
            'required' => 'El apellido es obligatorio.',
            'alpha_space' => 'El apellido no debe de contener caracteres especiales.',
        ],
        'email' => [
            'required' => 'El correo de usuario es obligatorio.',
            'valid_email' => 'El correo no cuenta con un formato valido.',
        ],
        'imageProfile' => [
            'required_files' => 'La foto de perfil es obligatoria',
        ],
        'imageBackground' => [
            'required_files' => 'La foto de portada es obligatoria',
        ],
        'occupationId' => [
            'required' => 'Por favor seleccione su ocupación principal', 
        ],
        'cardNumber' => [
            'required' => 'Su numero de tarjeta es obligatorio'
        ]
    ];
}