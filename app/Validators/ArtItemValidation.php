<?php

namespace App\Validators;
use App\Validators\BaseValidation;

class ArtItemValidation extends BaseValidation
{
    protected $validationRules = [
        'artStyleId' => 'required|integer',
        'artTypeId' => 'required|integer',
        'name' => 'required',
        'materials' => 'required',
        'shortDescription' => 'required',
        'description' => 'required',
        'measurements' => 'required',
        'localOrigin' => 'required',
        'onSale' => 'required|integer',
    ];

    protected $validationMessages = [
        'artStyleId' => [
            'required' => 'La selección de estilo es obligatoria',
            'integer' => 'No existe el tipo de estilo',
        ],
        'artTypeId' => [
            'required' => 'El selección de tipo es obligatoria',
            'integer' => 'No existe el tipo de arte',
        ],
        'name' => [
            'required' => 'El nombre de la obra es obligatorio',
        ],
        'materials' => [
            'required' => 'El material utilizado es obligatorio',
        ],
        'shortDescription' => [
            'required' => 'La descripción corta es obligatoria',
        ],
        'description' => [
            'required' => 'La descripción es obligatoria',
        ],
        'measurements' => [
            'required' => 'Las medidas son obligatorias',
        ],
        'localOrigin' => [
            'required' => 'El lugar de origen es obligatorio',
        ],
        'onSale' => [
            'required' => 'La selección es obligatoria',
            'integer' => 'No existe esa selección',
        ],
    ];
}