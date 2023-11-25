<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Errors\InvalidDataInputException;
use App\Models\ArtItem;

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

    public function viewEdit()
    {
        return view("pages/catalog/create");
    }

    public function create(String $userId)
    {
        try {
            $itemData = $this->request->getPost();

            $response = [
                'title' => '¡Creación exitosa!',
                'message' => 'Los datos de su obra de arte han sido guardado con exito',
                'type' => "success",
            ];
            return redirect()->to("/user/$userId/catalog")->with('response', $response);
        } catch (InvalidDataInputException $th) {
            return redirect()->to("/user/$userId/catalog/create")->withInput();
        } catch (\Throwable $th) {
            $response = [
                'title' => '¡Ops! Ha ocurrido un error',
                'message' => 'Ha ocurrido un error al guardar los datos de la obra, por favor intente nuevamente.',
                'type' => "error",
            ];
            return redirect()->to("/user/$userId/catalog/create")->withInput()->with('response', $response);
        }
    }

    public function edit(String $userId, String $artItemId)
    {
        try {
            $itemData = $this->request->getPost();

            $response = [
                'title' => '¡Actualización exitosa!',
                'message' => 'Los datos de su obra han sido actualizados con exito',
                'type' => "success",
            ];
            return redirect()->to("/user/$userId/catalog")->with('response', $response);
        } catch (InvalidDataInputException $th) {
            return redirect()->to("/user/$userId/catalog/edit/$artItemId")->withInput();
        } catch (\Throwable $th) {
            $response = [
                'title' => '¡Ops! Ha ocurrido un error',
                'message' => 'Ha ocurrido un error al actualizar los datos de la obra, por favor intente nuevamente.',
                'type' => "error",
            ];
            return redirect()->to("/user/$userId/catalog/edit/$artItemId")->withInput()->with('response', $response);
        }
    }

    public function delete(String $userId, String $artItemId)
    {
        try {
            // Cargar el modelo de artículos de arte
            $artItemModel = new ArtItem();

            // Verificar si el artículo de arte existe
            $artItem = $artItemModel->find($artItemId);
            if (!$artItem) {
                throw new \Exception('El artículo de arte no existe.');
            }

            // Verificar si el usuario es dueño del artículo de arte
            if ($artItem['userId'] !== $userId) {
                throw new \Exception('No tiene permisos para eliminar este artículo de arte.');
            }

            // Eliminar el artículo de arte
            $artItemModel->delete($artItemId);

            $response = [
                'title' => '¡Eliminación exitosa!',
                'message' => 'Los datos de la obra han sido eliminados correctamente',
                'type' => "success",
            ];
            return redirect()->to("/user/$userId/catalog")->with('response', $response);
        } catch (\Throwable $th) {
            $response = [
                'title' => '¡Ops! Ha ocurrido un error',
                'message' => 'Ha ocurrido un error al eliminar la obra, por favor intente nuevamente.',
                'type' => "error",
            ];
            return redirect()->to("/user/$userId/catalog/edit/$artItemId")->with('response', $response);
        }
    }
}
