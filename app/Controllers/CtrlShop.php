<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CtrlShop extends BaseController
{

    public function index(){
        return view("pages/shop/index"); 
    }

    public function viewPayment()
    {
        return view("pages/shop/payment"); 
    }

    public function viewCart(){
        return view ("pages/shop/cart"); 
    }

    public function viewItem()
    {
        return view("pages/shop/item");
    }

    public function payment(){
        return "...pagando";
    }
}
