<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Errors\InvalidDataInputException;

class CtrlArtCatalog extends BaseController
{
    public function index()
    {
        return view("pages/catalog/index"); 
    }
    public function viewCreate()
    {
        return view("pages/catalog/create"); 
    }

    public function viewEdit(){
        return view("pages/catalog/create");
    }

    public function create(String $userId){
        
        try {
            $itemData = $this->request->getPost();

            $response = [
                'title' => '¡Creación exitosa!', 
                'message' => 'Los datos de su obra de arte han sido guardado con exito', 
                'type' => "success",
            ];
            return "...create";
        } catch (InvalidDataInputException $th) {
            return redirect()->to("/user/$userId/catalog/create")->withInput();
        }
    }
    
    public function edit(String $userId,String $artItemId){
        try {
            $itemData = $this->request->getPost();
    
            $response = [
                'title' => '¡Actualización exitosa!', 
                'message' => 'Los datos de su obra han sido actualizados con exito', 
                'type' => "success",
            ];
            return "...edit";
        } catch (InvalidDataInputException $th) {
            return redirect()->to("/user/$userId/catalog/create")->withInput();
        }
    }
    
    public function delete(String $userId, String $artItemId){
        
        try {
            $response = [
                'title' => '¡Eliminación exitosa!', 
                'message' => 'Los datos de la obra han sido eliminados correctamente', 
                'type' => "success",
            ];
            return "...delete";
        } catch (\Throwable $th) {
            return redirect()->to("/user/$userId/catalog");
        }
    }
}
