<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtStyle extends Model
{
    protected $table            = 'art_styles';
    protected $primaryKey       = 'artStyleId';
    protected $allowedFields    = ['artStyleType'];
}
