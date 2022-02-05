<?php

namespace App\Controllers;

use App\Models\Entities\Korisnik;

class Login extends BaseController
{
    protected function prikaz($page, $data)
    {
        $data['controller'] = 'Login';
        echo view("stranice/$page", $data);
        echo view('sablon/footer');
    }

    public function log($puruka = null)
    {
        $this->prikaz('login', ['poruka' => $puruka]);
    }

//    public function index()
//    {
//        $korisnik = $this->doctrine->em->getRepository(Korisnik::class)
//            ->findBy(['ime' => 'Luka']);
//        echo $this->request->getVar('kor_ime');
//        echo 'login';
//        if ($korisnik == null) {
//            echo "nema korisnika";
//        }else{
//            echo $korisnik[0]->getIme();
//        }
//        //echo $korisnik->getIme();
//        //return view('stranice\index');
//    }

    public function login()
    {
//        if (!$this->validate(['kor_ime'=>'required', 'lozinka'=>'required'])){
//            return $this->prikaz('index',['errors'=>$this->validator->getErrors()]);
//        }
        $korisnik = $this->doctrine->em->getRepository(Korisnik::class)
            ->findOneBy(['korIme' => $this->request->getVar('kor_ime')]);
        if ($korisnik == null) {
            return $this->log('Korisnik ne postoji');
        }
        echo $korisnik->getTip()->getTipKorisnika();
        $this->session->set('korisnik', $korisnik->getIme());
        //$this->session->set('kalus','kalus');
//        if ($korisnik->getTip()->getTipKorisnika() == "kupac") {
//            return redirect('korisnik');
//        }
        return redirect()->to(site_url('korisnik'));
    }
}