<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CtrlShop extends BaseController
{
    public function viewPayment()
    {
        return view("pages/shop/payment"); 
    }

    public function viewCart(){
        return view ("pages/shop/cart"); 
    }
}
