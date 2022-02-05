<?php

namespace App\Controllers;

use App\Models\Entities\Korisnik;

class Home extends BaseController
{
	public function index()
	{
        /*$gradovi = $this->doctrine->em->getRepository(Korisnik::class)->findAll();
        $grad  = $gradovi[0];
        echo $gradovi[0]->getIme();
        $grad  = $gradovi[1];
        echo $gradovi[1]->getIme();*/
		return view('stranice\index');
	}
//    public function login(){
////        $korisnik = $this->doctrine->em->getRepository(Korisnik::class)->find($this->request->getVar('kor_ime'));
////        return $korisnik->getIme();
//        echo 'login';
//        return view('stranice\index');
//    }
}
