<?php

namespace App\Controllers;
use App\Libraries\Doctrine;
use Config\Services;
use PharIo\Manifest\Library;

class Home extends BaseController
{
    public function index()
    {
        return view('index');
    }
}
