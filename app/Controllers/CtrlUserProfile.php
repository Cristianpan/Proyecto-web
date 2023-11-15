<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CtrlUserProfile extends BaseController
{
    public function index()
    {   
        return view("pages/user/index"); 
    }

    public function viewEdit(){
        return view("pages/user/edit"); 
    }
}
