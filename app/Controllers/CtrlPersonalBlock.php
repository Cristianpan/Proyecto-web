<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Errors\InvalidDataInputException;

class CtrlPersonalBlock extends BaseController
{
    public function create(String $userId)
    {
        try {
            $dataPersonalBlock = json_decode($this->request->getBody(), true);
        } catch (InvalidDataInputException $th) {
            return $this->response->setJSON(['ok' => false, 'body' => $th->getErros()])->setStatusCode(400); 
        }
        return $this->response->setJSON(['ok' => true, 'body' => $dataPersonalBlock])->setStatusCode(201); 
    }

    public function update(String $userId, String $personalBlockId){   

    }

    public function delete(String $userId, String $personalBlockId){

    }
}
