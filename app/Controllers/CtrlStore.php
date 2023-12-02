<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArtItem;
use CodeIgniter\Exceptions\PageNotFoundException;

class CtrlStore extends BaseController
{

    public function index(){
        return view("pages/store/index", ['items' => (new ArtItem())->getAllItems()]); 
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
        return "...pagando";
    }
}
