<?php


namespace App\Controllers;


class Korisnik extends BaseController
{
    public function index()
    {
        echo $this->session->get('korisnik');
        return view('stranice\kupac');
    }
}
