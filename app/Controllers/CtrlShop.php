<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CtrlShop extends BaseController
{
    public function index()
    {
        return view("pages/shop/cart/payment"); 
    }

    public function viewCart(){
        return view ("pages/shop/cart"); 
    }
}
