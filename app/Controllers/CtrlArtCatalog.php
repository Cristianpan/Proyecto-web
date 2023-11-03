<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CtrlArtCatalog extends BaseController
{
    public function index()
    {
        return view("pages/catalog/index"); 
    }
    public function viewCreateItem()
    {
        return view("pages/catalog/create"); 
    }
}
