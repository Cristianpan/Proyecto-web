<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Errors\InvalidDataInputException;
use App\Models\ArtItem;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\ShippingDetails;
use App\Validators\DataClientValidation;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\Response;
use DateTime; 

class CtrlStore extends BaseController
{

    public function index(){
        $userId = session()->get('user')['userId'];

        $search = trim($this->request->getGet('search') ?? '');

        if (!$search) {
            return view("pages/store/index", ['items' => (new ArtItem())->getAllItems($userId)]); 

        } else  {

            return view("pages/store/index", ['items' => (new ArtItem())->getItemsByLike($search)]); 
        }

    }

    public function viewPayment()
    {
        return view("pages/store/payment"); 
    }

    public function viewCart(){
        return view ("pages/store/cart"); 
    }

    public function viewItem(String $artItemId)
    {
        $artItem = (new ArtItem())->getItemById($artItemId);

        if (is_null($artItem)){
            throw PageNotFoundException::forPageNotFound();
        }

        return view("pages/store/item", ['artItem' => $artItem]);
    }

    public function payment(){

        try {
            $data = $this->request->getJSON(true); 

            $validator = new DataClientValidation(); 
            $validator->validateInputs($data['details']);

            (new Order())->createOrder($data);

            $reponse = [
                'ok' => true, 
                'message' => "La compra ha sido realizada con éxito", 
                "body" => []
            ];

            return $this->response->setJSON($reponse)->setStatusCode(Response::HTTP_OK);
        } catch(InvalidDataInputException $th) {
            $reponse = [
                'ok' => false, 
                'message' => "Verifique que haya proporcionado todos los datos correctamente.", 
                "body" => $th->getErros(),
            ];
            return $this->response->setJSON($reponse)->setStatusCode(Response::HTTP_BAD_REQUEST);
        }
        catch (\Throwable $th) {
            $reponse = [
                'ok' => false, 
                'message' => "Ha ocurrido un error al realizar la compra, porfavor intente nuevamente.", 
                "body" => []
            ];
            return $this->response->setJSON($reponse)->setStatusCode(Response::HTTP_BAD_REQUEST);
        }
    }
}
