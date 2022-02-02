<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Fahrenheit extends BaseController
{
    public function index()
    {
        return view('welcome_message');

    }
}
