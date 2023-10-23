<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CtrlAuth extends BaseController
{
    public function index()
    {
        return view("pages/auth/index"); 
    }

    public function signup() {
        return view("pages/auth/signup"); 
    } 
}
