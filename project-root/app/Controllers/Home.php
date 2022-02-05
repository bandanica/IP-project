<?php

namespace App\Controllers;

use App\Models\Entities\Korisnik;

class Home extends BaseController
{
    public function index()
    {
        echo "Home";
    }
//    public function login(){
////        $korisnik = $this->doctrine->em->getRepository(Korisnik::class)->find($this->request->getVar('kor_ime'));
////        return $korisnik->getIme();
//        echo 'login';
//        return view('stranice\index');
//    }
}
