<?php

namespace App\Models;

use CodeIgniter\Model;
use Faker\Core\Uuid;

class ArtItem extends Model
{
    protected $table            = 'art_items';
    protected $primaryKey       = 'artItemId';
    protected $allowedFields    = ['userId','title', 'description','artist'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['setId'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function setId(array $data){
        $data['data']['artItemId'] = (new Uuid())->uuid3();
        return $data; 
    }
}
