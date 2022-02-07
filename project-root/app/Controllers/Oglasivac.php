<?php

namespace App\Controllers;

use App\Models\EntitetiZaProsledjivanje\Nekretnine;
use App\Models\Entities\Nekretnina;

class Oglasivac extends BaseController
{
    public function index()
    {
        //echo $this->session->get("korisnik")->getIme();
        $poruka = $this->session->get("poruka2");
        $this->session->set("poruka2", '');
        $id = $this->session->get('korisnik');
        //echo $id;
        $kor = $this->doctrine->em->getRepository(\App\Models\Entities\Korisnik::class)->findOneBy(['idK'=>$id]);
        //echo $kor->getIme();
        $nekretnine = $this->doctrine->em->getRepository(Nekretnina::class)->findBy(['oglasivac'=>$kor]);
//        $prosNek = [];
//        foreach ($nekretnine as $n){
//            $nek1 = new Nekretnine($n);
//            array_push($prosNek,$nek1);
//        }

        return $this->prikaz('oglasivac',['poruka2'=>$poruka,'mojenekretnine'=>$nekretnine]);
    }
    protected function prikaz($page, $data)
    {
        $data['controller'] = 'Oglasivac';
        return view("stranice/$page", $data);
    }
    public function promenaLozinke(){
        return $this->prikaz('promenaSifre',[]);
    }
    public function zameniLozinku(){
        $this->session->set("poruka2", '');
        $stara = $this->request->getVar('staraL');
        $kor = $this->session->get('korisnik');
        $kor = $this->doctrine->em->getRepository(\App\Models\Entities\Korisnik::class)->findOneBy(['idK'=>$kor]);
        $loz = $kor->getLozinka();
        echo $loz;
        echo "<br/>";
        echo $stara;

        //$dobraStara = $this->doctrine->em->getRepository(\App\Models\Entities\Korisnik::class)->findOneBy(['kor'=>])
        if ($loz===$stara){
            $nova = $this->request->getVar('novaL');
            $kor->setLozinka($nova);
            $this->doctrine->em->flush();
            $this->session->remove('korisnik');
            $this->session->set('porukaLozinka','Uspesno promenjena lozinka');
            echo "Promenjeno";
            return redirect()->to(site_url());
        }
        else{
            $this->session->set("poruka2", 'Niste uneli dobru staru lozinku');
            return redirect()->to(site_url('oglasivac'));
        }
    }

    public function novaNekretnina(){
        return $this->prikaz('dodavanjeNekretnine',[]);
    }
}