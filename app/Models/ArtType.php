<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtType extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'art_types';
    protected $primaryKey       = 'artTypeId';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['artType'];
}
