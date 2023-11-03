<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CtrlArtItem extends BaseController
{
    public function index()
    {
        return view("pages/art/item");
    }
    public function cart()
    {
        return view("pages/art/cart");
    }
}
