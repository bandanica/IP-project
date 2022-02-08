<?php

namespace App\Controllers;

use App\Models\EntitetiZaProsledjivanje\Nekretnine;
use App\Models\Entities\Agencija;
use App\Models\Entities\Grad;
use App\Models\Entities\Karakteristike;
use App\Models\Entities\Mikrolokacija;
use App\Models\Entities\Nekretnina;
use App\Models\Entities\Opstina;
use App\Models\Entities\Tipnekretnine;
use App\Models\Entities\Ulica;
use DateTime;

class Oglasivac extends BaseController
{
    public function index()
    {
        //echo $this->session->get("korisnik")->getIme();
        $poruka = $this->session->get("poruka2");
        $this->session->set("poruka2", '');
        $id = $this->session->get('korisnik');
        //echo $id;
        $kor = $this->doctrine->em->getRepository(\App\Models\Entities\Korisnik::class)->findOneBy(['idK' => $id]);
        //echo $kor->getIme();
        $nekretnine = $this->doctrine->em->getRepository(Nekretnina::class)->findBy(['oglasivac' => $kor]);
//        $prosNek = [];
//        foreach ($nekretnine as $n){
//            $nek1 = new Nekretnine($n);
//            array_push($prosNek,$nek1);
//        }

        return $this->prikaz('oglasivac', ['poruka2' => $poruka, 'mojenekretnine' => $nekretnine]);
    }

    protected function prikaz($page, $data)
    {
        $data['controller'] = 'Oglasivac';
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
            return redirect()->to(site_url('oglasivac'));
        }
    }

    public function novaNekretnina()
    {
        $gradovi = $this->doctrine->em->getRepository(Grad::class)->findAll();
        return $this->prikaz('dodavanjeNekretnine', ['gradovi' => $gradovi]);
    }

    public function opstineUGradu()
    {
        $grad = $this->doctrine->em->getRepository(Grad::class)->find($this->request->getVar('idgrad'));
        $opstine = $this->doctrine->em->getRepository(Opstina::class)->findBy(['grad' => $grad]);
        $sveOpstine = [];
        foreach ($opstine as $o)
            array_push($sveOpstine, [
                "naziv" => $o->getNaziv(),
                "idO" => $o->getIdopstine()
            ]);
        return json_encode($sveOpstine);
    }

    public function lokacijeUOpstini()
    {
        $opstina = $this->doctrine->em->getRepository(Opstina::class)->find($this->request->getVar('idO'));
        $lokacije = $this->doctrine->em->getRepository(Mikrolokacija::class)->findBy(['opstina' => $opstina]);
        $sveLokacije = [];
        foreach ($lokacije as $l)
            array_push($sveLokacije, [
                "naziv" => $l->getNaziv(),
                "idL" => $l->getIdmikro()
            ]);
        return json_encode($sveLokacije);
    }

    public function uliceNaLokaciji()
    {
        $lokacija = $this->doctrine->em->getRepository(Mikrolokacija::class)->find($this->request->getVar('idL'));
        $ulice = $this->doctrine->em->getRepository(Ulica::class)->findBy(['mikrolokacija' => $lokacija]);
        $sveUlice = [];
        foreach ($ulice as $u)
            array_push($sveUlice, [
                "naziv" => $u->getNaziv(),
                "idU" => $u->getIdu()
            ]);
        return json_encode($sveUlice);
    }


    public function zavrsiDodavanjeNekretnine()
    {
        $ime = $this->request->getVar('nazivN');
        $grad = $this->doctrine->em->getRepository(Grad::class)->find($this->request->getVar('gr'));
        $opstina = $this->doctrine->em->getRepository(Opstina::class)->find($this->request->getVar('opst'));
        $lokacija = $this->doctrine->em->getRepository(Mikrolokacija::class)->find($this->request->getVar('lok'));
        $ulica = $this->doctrine->em->getRepository(Ulica::class)->find($this->request->getVar('ul'));
        $kv = (int)$this->request->getVar('kvadratura');
        $sobe = (int)$this->request->getVar('brsoba');
        $gi = $this->request->getVar('dizgradnje');
        $gi = date_create_from_format("Y-m-d", $gi);
        $gi = new DateTime;
        $stanjen = $this->request->getVar('stanje');
        $sprat = (int)$this->request->getVar('sprat');
        $uks = (int)$this->request->getVar('ukspratnost');
        $opis = $this->request->getVar('opisNek');
        $mtroskovi = $this->request->getVar('mesTroskovi');
        $c = (int)$this->request->getVar('cenaNekretnine');
        //dodavanje entiteta karakteristike koje nekretnina ima
        $p = "ne";
        $t = "ne";
        $g = "ne";
        $l = "ne";
        $lift = "ne";
        $fb = "ne";
        $pod = 'ne';
        $bast = 'ne';
        $k = 'ne';
        $in = 'ne';
        $tel = 'ne';
        //$grejanje = $this->request->getVar('grej');
        if ($this->request->getVar('parking') != '') {
            $p = "da";
        }
        if ($this->request->getVar('terasa') != '') {
            $t = "da";
        }
        if ($this->request->getVar('garaza') != '') {
            $g = "da";
        }
        if ($this->request->getVar('lodja') != '') {
            $l = "da";
        }
        if ($this->request->getVar('lift') != '') {
            $lift = "da";
        }
        if ($this->request->getVar('balkon') != '') {
            $fb = "da";
        }
        if ($this->request->getVar('podrum') != '') {
            $pod = "da";
        }
        if ($this->request->getVar('basta') != '') {
            $bast = "da";
        }
        if ($this->request->getVar('klima') != '') {
            $k = "da";
        }
        if ($this->request->getVar('internet') != '') {
            $in = "da";
        }
        if ($this->request->getVar('telefon') != '') {
            $tel = "da";
        }

        //echo $grejanje;
//        echo "<br/>";
//        echo $p;
//        echo "<br/>";
//        echo $t;
//        echo "<br/>";
//        echo $g;
//        echo "<br/>";
//        echo $l;
//        echo "<br/>";
//        echo $lift;
//        echo "<br/>";
//        echo $fb;
//        echo "<br/>";
//        echo $pod;
//        echo "<br/>";
//        echo $bast;
//        echo "<br/>";
//        echo $k;
//        echo "<br/>";
//        echo $in;
//        echo "<br/>";
//        echo $tel;
//        echo "<br/>";
        $grejanje = "Na struju";
        $kar = new Karakteristike();
        $kar->setTelefon($tel);
        $kar->setFrancBalkon($fb);
        $kar->setGaraza($g);
        $kar->setInternet($in);
        $kar->setKlima($k);
        $kar->setLift($lift);
        $kar->setLodja($l);
        $kar->setParking($p);
        $kar->setPodrum($pod);
        $kar->setSaBastom($bast);
        $kar->setTerasa($t);
        //GREJANJE DIREKTNO U NEKRETNINI
        $this->doctrine->em->persist($kar);
        //$this->doctrine->em->flush();

        $nekretninaN = new Nekretnina();
        $nekretninaN->setStatus('Aktivno');
        $nekretninaN->setParking($p);
        //$nekretninaN->setTip("stan");
        $nekretninaN->setBrSoba($sobe);
        $nekretninaN->setCena($c);
        $nekretninaN->setGodinaIzgradnje($gi);
        $nekretninaN->setGrejanje($grejanje);
        $nekretninaN->setKarakteristike($kar);
        $nekretninaN->setGradid($grad);
        $nekretninaN->setNaziv("$ime");
        $nekretninaN->setKvadratura($kv);
        $nekretninaN->setStanje($stanjen);
        $nekretninaN->setSprat($sprat);
        $nekretninaN->setUkupnaSpratnost($uks);
        $nekretninaN->setOpis($opis);
        $nekretninaN->setMesecniTroskovi($mtroskovi);
        $nekretninaN->setOpstina($opstina);
        $nekretninaN->setMikrolokacija($lokacija);
        $nekretninaN->setUlica($ulica);
        $oglasivac = $this->doctrine->em->getRepository(\App\Models\Entities\Korisnik::class)->find(3);
        //echo $oglasivac->getIdK();
        $nekretninaN->setOglasivac($oglasivac);
        //$ag = $oglasivac->getIdagencije();

        $nekretninaN->setAgencija($oglasivac->getIdagencije());


        $tipnekr = "stan";
        $tipnekr = $this->doctrine->em->getRepository(Tipnekretnine::class)->findOneBy(['nazivTipa' => $tipnekr]);
        $nekretninaN->setTip($tipnekr);
        $this->doctrine->em->persist($nekretninaN);
        $this->doctrine->em->flush();
        return redirect()->to(site_url("oglasivac"));

    }
}