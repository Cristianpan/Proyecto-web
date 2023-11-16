<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Errors\InvalidDataInputException;
use App\Models\PersonalBlock;
use App\Validators\PersonalBlockValidation;

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

        try {
            $dataPersonalBlock = json_decode($this->request->getBody(), true);
            $personalBlockValidation = new PersonalBlockValidation();
            $personalBlockValidation->validateInputs($dataPersonalBlock);

            $title = $dataPersonalBlock['title'];
            $description = $dataPersonalBlock['description'];
            $personalBlock = new PersonalBlock();
            $foundBlock = $personalBlock
                ->where('personalBlockId', $personalBlockId)
                ->where('userId', $userId)
                ->first();

            if ($foundBlock == null) {
                throw new \Exception('No existe el bloque personalizado');
            }

            $data = [
                'title' => $title,
                'description'  => $description,
            ];
            
            $personalBlock->update($personalBlockId, $data);

            $body = [
                'personalBlockId' => $personalBlockId,
                'userId' => $userId,
                'title' => $title,
                'description' => $description
            ];
            return $this->response->setJSON(['ok' => true, 'body' => $body])->setStatusCode(200); 
        } catch (InvalidDataInputException $th) {
            return $this->response->setJSON(['ok' => false, 'body' => $th->getErros()])->setStatusCode(400);
        } catch(Exception $th){
            return $this->response->setJSON(['ok' => false, 'body' => $th->getErros()])->setStatusCode(400);
        }
    }

    public function delete(String $userId, String $personalBlockId){

    }
}
