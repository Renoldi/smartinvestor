<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RoyalQ extends BaseController
{
    public function index()
    {
        return view('welcome_message');

    }
}
