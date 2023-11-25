<?php

namespace App\Validators;

use App\Validators\BaseValidation;

class ArtItemValidation extends BaseValidation
{
    protected $validationRules = [
        'title' => 'required',
        'description' => 'required',
        'artist' => 'required|',
    ];

    protected $validationMessages = [
        'title' => [
            'required' => 'El título es obligatorio',
        ],
        'description' => [
            'required' => 'La descripción es obligatoria',
        ],
        'artist' => [
            'required' => 'El nombre del artista es obligatorio',
        ],
    ];
}
