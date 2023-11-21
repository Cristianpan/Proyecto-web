<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Errors\InvalidDataInputException;
use App\Models\FileModel;
use App\Models\Occupation;
use App\Models\PersonalBlock;
use App\Models\User;
use App\Models\UserDetails;
use App\Utils\FileManager;
use App\Utils\FilePondManager;
use App\Validators\UserEditValidation;

class CtrlUserProfile extends BaseController
{
    public function index()
    {
        return view("pages/user/index", ['personalBlocks' => []]);
    }

    public function viewEdit(String $userId)
    {
        $occupations = (new Occupation())->findAll();
        $personalBlocks = (new PersonalBlock())->where('userId', $userId)->findAll();
        $userData = (new User())->where('userId', $userId)->first();
        $userDetails = (new UserDetails())->where('userId', $userId)->first();

        $imageBackground = (new FileModel())->where('fileId', $userDetails['imageBackground'] ?? '')->first();
        $imageProfile = (new FileModel())->where('fileId', $userDetails['imageProfile'] ?? '')->first();

        if ($imageBackground) {
            $imageBackground = FilePondManager::getSource([$imageBackground['uuid']]);
        }

        if ($imageProfile) {
            $imageProfile = FilePondManager::getSource([$imageProfile['uuid']]);
        }

        return view("pages/user/edit", [
            'occupations' => $occupations,
            'personalBlocks' => $personalBlocks,
            'userData' => $userData,
            'userDetails' => $userDetails,
            'imageBackground' => $imageBackground,
            'imageProfile' => $imageProfile,
        ]);
    }

    public function edit(String $userId)
    {
        try {
            $userData = $this->request->getPost();
            $validator = new UserEditValidation(); 
            $validator->validateInputs($userData);

            (new User())->update($userId, $userData);

            
            $usertDataToSave = [
                'userId' => $userId,
                'userDetailId' => $userData['userDetailId'],
                'description' => $this->request->getPost('description'),
                'cardNumber' => $this->request->getPost('cardNumber'),
                'occupationId' => $this->request->getPost('occupationId')
            ];
            
            
            $auxImageBg = $userData['imageBackground']; 
            $auxImageProfile = $userData['imageProfile']; 
            $fileModel = new FileModel();
            if (!file_exists(FILES_UPLOAD_DIRECTORY . $auxImageBg)){
                $usertDataToSave['imageBackground'] = $fileModel->insert(['uuid' => $auxImageBg]);
            }
            
            if (!file_exists(FILES_UPLOAD_DIRECTORY . $auxImageProfile)){
                $usertDataToSave['imageProfile'] = $fileModel->insert(['uuid' => $auxImageProfile]);
            }
            
            (new UserDetails())->save($usertDataToSave);

            if (isset($userData['delete-imageBackground'])){
                $fileModel->where('uuid', $userData['delete-imageBackground'])->delete();
                FileManager::deleteFolderWithContent($userData['delete-imageBackground']);
            }
            if (isset($userData['delete-imageProfile'])){
                $fileModel->where('uuid', $userData['delete-imageProfile'])->delete();
                FileManager::deleteFolderWithContent($userData['delete-imageProfile']);
            }

            $response = [
                'title' => 'Actualización exitosa',
                'message' => 'Los datos del usuario han sido actualizados correctamente.',
                'type' => 'success'
            ];
            return redirect()->to("/user/$userId/edit")->with('response', $response); 
        } catch (InvalidDataInputException $th){
            return redirect()->to("/user/$userId/edit")->withInput();
        } catch (\Throwable $th){
            $response = [
                'title' => 'Oops! Ha ocurrido un error',
                'message' => 'Ha ocurrido un error al actualizar los datos del usuario, por favor intente nuevamente',
                'type' => 'success'
            ];

            return redirect()->to("/user/$userId/edit")->withInput()->with('response', $response);
        }
    }
}
