<?php


namespace App\Controllers;


use App\Models\EntitetiZaProsledjivanje\Nekretnine;
use App\Models\Entities\Nekretnina;
use App\Models\Entities\Tipnekretnine;

class Korisnik extends BaseController
{
    public function index()
    {
        //echo $this->session->get("korisnik")->getIme();
        //dohvatanje tipova nekretnina
        $tipN = $this->doctrine->em->getRepository(Tipnekretnine::class)->findAll();

        $poruka = $this->session->get("poruka2");
        $this->session->set("poruka2", '');
        return $this->prikaz('kupac', ['poruka2' => $poruka, 'tipoviN' => $tipN]);
    }

    protected function prikaz($page, $data)
    {
        $data['controller'] = 'Korisnik';
        return view("stranice/$page", $data);
    }

    public function promenaLozinke()
    {
        return $this->prikaz('promenaSifre', []);
    }

    public function zameniLozinku()
    {
        $this->session->set("poruka2", '');
        $stara = $this->request->getVar('staraL');
        $kor = $this->session->get('korisnik');
        $kor = $this->doctrine->em->getRepository(\App\Models\Entities\Korisnik::class)->findOneBy(['idK' => $kor]);
        $loz = $kor->getLozinka();
        echo $loz;
        echo "<br/>";
        echo $stara;

        //$dobraStara = $this->doctrine->em->getRepository(\App\Models\Entities\Korisnik::class)->findOneBy(['kor'=>])
        if ($loz === $stara) {
            $nova = $this->request->getVar('novaL');
            $kor->setLozinka($nova);
            $this->doctrine->em->flush();
            $this->session->remove('korisnik');
            $this->session->set('porukaLozinka', 'Uspesno promenjena lozinka');
            echo "Promenjeno";
            return redirect()->to(site_url());
        } else {
            $this->session->set("poruka2", 'Niste uneli dobru staru lozinku');
            return redirect()->to(site_url('korisnik'));
        }
    }

    public function pretragaNekretnine()
    {
        $t = $this->request->getVar('izabranTip');
        $c = $this->request->getVar('cenaDO');
        $k = $this->request->getVar('kvadrOD');
        $s = $this->request->getVar('brs');
        //OVO TREBA DA SE PROMENI UPIT DA PRETRAZI ZA SVE!!!
        $Tip = $this->doctrine->em->getRepository(Tipnekretnine::class)->findOneBy(['nazivTipa'=>$t]);
        $Tip = $Tip->getIdtipnekretnine();

        $nek = $this->doctrine->em->getRepository(Nekretnina::class)->findBy(['tip'=>$Tip]);
//        $nadjene=[];
//        echo "Nadjene nekretnine";
//        foreach ($nek as $n){
//            $nek1 = new Nekretnine($n);
//            array_push($nadjene,$nek1);
//        }
        //echo $nadjene[0]->getNaziv();
        //echo $nadjene[1]->getNaziv();
        return $this->prikaz('rezultatiPretrage',['rezultati'=>$nek]);
    }
    public function naprednaPretraga(){
        return $this->prikaz('naprednaPretraga',[]);
    }

    public function izvrsiNapredno(){
        return $this->prikaz('rezultatiPretrage',[]);
    }
}
