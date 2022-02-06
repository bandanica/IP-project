<?php

namespace App\Controllers;

use App\Models\Entities\Korisnik;

class Administrator extends BaseController
{
    public function index()
    {
        $k = 0;
        $korisnici = $this->doctrine->em->getRepository(Korisnik::class)->findBy(['status' => 0]);
        //$korisnici = $this->doctrine->em->getRepository(Korisnik::class)->findAll();
        $tl = [];
//        foreach ($korisnici as $kor) {
//            array_push($tl, $kor);
//            echo $kor->getKorIme();
//            echo "<br/>";
//        }

        //echo $this->session->get('korisnik');
        return $this->prikaz('administrator', ['zahtevi' => $korisnici]);

    }

    protected function prikaz($page, $data)
    {
        $data['controller'] = 'Administrator';
        return view("stranice/$page", $data);
    }

    public function obradi(){
        if ($this->request->getVar('dugme')=='prihvati'){
            $korisnik = $this->request->getVar('idKor');
            $korisnik1 = $this->doctrine->em->getRepository(Korisnik::class)->findOneBy(['idK' => $korisnik]);
            $korisnik1->setStatus(1);
            $this->doctrine->em->flush();
            return redirect()->to(site_url('administrator'));

        }
        else{
            $korisnik = $this->request->getVar('idKor');
            $korisnik = $this->doctrine->em->getRepository(Korisnik::class)->findOneBy(['idK' => $korisnik]);
            $korisnik->setStatus(2);
            $this->doctrine->em->flush();
            return redirect()->to(site_url('administrator'));
        }
    }
}