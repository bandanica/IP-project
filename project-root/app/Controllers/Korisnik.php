<?php


namespace App\Controllers;


use App\Models\EntitetiZaProsledjivanje\Nekretnine;
use App\Models\Entities\Grad;
use App\Models\Entities\Mikrolokacija;
use App\Models\Entities\Nekretnina;
use App\Models\Entities\Opstina;
use App\Models\Entities\Tipkorisnika;
use App\Models\Entities\Tipnekretnine;

class Korisnik extends BaseController
{
    public function index()
    {
        //echo $this->session->get("korisnik")->getIme();
        //dohvatanje tipova nekretnina
        $tipN = $this->doctrine->em->getRepository(Tipnekretnine::class)->findAll();
        //dohvatanje svih lokacija
        $gradovi = $this->doctrine->em->getRepository(Grad::class)->findAll();
        $opstine = $this->doctrine->em->getRepository(Opstina::class)->findAll();
        $mlokacije = $this->doctrine->em->getRepository(Mikrolokacija::class)->findAll();
        $lokacije = [];
        foreach ($gradovi as $g) {
            array_push($lokacije, $g->getNaziv());
        }
        foreach ($opstine as $o) {
            $gr = $o->getGrad()->getNaziv();
            $op = $o->getNaziv();
            $s = "$gr" . "/" . "$op";
            array_push($lokacije, $s);
        }
        foreach ($mlokacije as $lok) {
            $ml = $lok->getNaziv();
            $op = $lok->getOpstina()->getNaziv();
            $gr = $lok->getOpstina()->getGrad()->getNaziv();
            $s = "$gr" . "/" . "$op" . "/" . "$ml";
            array_push($lokacije, $s);
        }
        $poruka = $this->session->get("poruka2");
        $this->session->set("poruka2", '');

        //$this->session->remove('nump');
        //$this->session->remove('page');
        //echo view("sabloni/headerKupac");
        $this->prikaz('kupac', ['poruka2' => $poruka, 'tipoviN' => $tipN, 'lokacije' => $lokacije]);
        //echo view("sabloni/footer");
    }

    protected function prikaz($page, $data)
    {
        $data['controller'] = 'Korisnik';
        if ($this->session->has('korisnik')) {
            echo view("sabloni/headerKupac");
        } else {
            echo view("sabloni/header");
        }

        echo view("stranice/$page", $data);
        echo view("sabloni/footer");
        //return view("stranice/$page", $data);
    }

    public function promenaLozinke()
    {
        $t = $this->session->get('vrstaKor');
        $this->prikaz('promenaSifre', ['tip'=>$t]);
    }

    public function zameniLozinku()
    {
        $this->session->set("poruka2", '');
        $stara = md5($this->request->getVar('staraL'));
        $kor = $this->session->get('korisnik');
        $kor = $this->doctrine->em->getRepository(\App\Models\Entities\Korisnik::class)->findOneBy(['idK' => $kor]);
        $loz = $kor->getLozinka();
        echo $loz;
        echo "<br/>";
        echo $stara;

        //$dobraStara = $this->doctrine->em->getRepository(\App\Models\Entities\Korisnik::class)->findOneBy(['kor'=>])
        if ($loz === $stara) {
            $nova = $this->request->getVar('novaL');
            $kor->setLozinka(md5($nova));
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

        if ($c == '') {
            $c = 10000000;
        } else {
            $c = (int)$c;
        }
        if ($k == '') {
            $k = 0;
        } else {
            $k = (int)$k;
        }
        if ($s == '') {
            $s = 0;
        } else {
            $s = (double)$s;
        }


        $Tip = $this->doctrine->em->getRepository(Tipnekretnine::class)->findOneBy(['nazivTipa' => $t]);

        $Tip = $Tip->getIdtipnekretnine();

        $l = explode("\t", $this->request->getVar('Lokacija'));
        $b = 0;
        if ($l == null) {
            $b = 1;
        } elseif (count($l) == 1) {
            foreach ($l as $l1) {
                if ($l1 == "") {
                    $b = 1;
                }
            }
        }

        $lokacijePretraga = [];
        $nek = [];
        if ($b == 0) {
            foreach ($l as $l1) {
                $string1 = explode("/", $l1);
                $string1 = end($string1);
                $obj = $this->doctrine->em->getRepository(Mikrolokacija::class)->findOneBy(['naziv' => $string1]);
                $x = 'ml';
                if ($obj == null) {
                    $x = 'op';
                    $obj = $this->doctrine->em->getRepository(Opstina::class)->findOneBy(['naziv' => $string1]);

                } else {
                    $obj = $obj->getIdmikro();
                    $nek = array_merge($nek, $this->doctrine->em->getRepository(Nekretnina::class)->traziNekretnineLokacija($c, $k, $s, $obj, $Tip));
                    continue;
                }
                if ($obj == null) {
                    $x = 'gr';
                    $obj = $this->doctrine->em->getRepository(Grad::class)->findOneBy(['naziv' => $string1]);
                } else {
                    $obj = $obj->getIdopstine();
                    $nek = array_merge($nek, $this->doctrine->em->getRepository(Nekretnina::class)->traziNekretnineOpstina($c, $k, $s, $obj, $Tip));
                    continue;
                }
                $obj = $obj->getIdg();
                //$nek = $this->doctrine->em->getRepository(Nekretnina::class)->traziNekretnineGrad($c,$k,$s,$obj,$Tip);
                $nek = array_merge($nek, $this->doctrine->em->getRepository(Nekretnina::class)->traziNekretnineGrad($c, $k, $s, $obj, $Tip));

                //array_push($lokacijePretraga,$obj);
            }
        } else {
            $nek = $this->doctrine->em->getRepository(Nekretnina::class)->traziNekretnineBezLokacije($c, $k, $s, $Tip);
        }

        rsort($nek);

        //$nek=[];
//        foreach ($lokacijePretraga as $obj){
//            $nek = array_merge($nek,$this->doctrine->em->getRepository(Nekretnina::class)->traziNekretnine($x,$c,$k,$s,$obj,$Tip));
//        }
        //$nek = $this->doctrine->em->getRepository(Nekretnina::class)->traziNekretnine($c,$k,$s,$Tip);
        //echo $nek;
        //echo view("sabloni/headerKupac");
        $page = 1;
        $n = count($nek);
        $numpages = ceil($n / 10);
        $zaprvu = [];
        $i = 0;
        foreach ($nek as $n1) {
            array_push($zaprvu, $n1);
            $i += 1;
            if ($i == 10) {
                break;
            }

        }
        $ids = [];
        foreach ($nek as $n1) {
            array_push($ids, $n1->getIdn());
        }
        $this->session->set('sveN', $ids);
        //$this->session->set('page',$page);
        //$this->session->set('nump',$numpages);
        $sveNekr = [];

        foreach ($zaprvu as $n) {
            array_push($sveNekr, [
                'html' => $this->prikazJedne($n->getIdn())
            ]);
        }
        array_push($sveNekr, ['html' => $this->prikazPagin($numpages, $page)]);


        return json_encode($sveNekr);

        //$this->prikaz('rezultatiPretrage', ['rezultati' => $zaprvu,'sve'=>$ids,'page'=>$page,'nump'=>$numpages]);
        //echo view("sabloni/footer");
        //return redirect()->to(site_url("korisnik/promenaStranice?page=1"));
    }

    private function prikazJedne($idn)
    {
        $n = $this->doctrine->em->getRepository(Nekretnina::class)->find($idn);
        $lok = $n->getMikrolokacija()->getIdmikro();
        $tip = $n->getTip()->getIdtipnekretnine();
        $slicne = $this->doctrine->em->getRepository(Nekretnina::class)->nadjiSlicneNekretnine($tip, $lok);
        $suma = 0;
        $prosek = $n->getCena() / $n->getKvadratura();
        $tmpProsek = $prosek;
        if ($slicne != null) {
            $uk = count($slicne);
            foreach ($slicne as $sl) {
                $tmpCena = $sl->getCena() / $sl->getKvadratura();
                //echo $sl->getIdn();
                $suma += $tmpCena;
            }
            $prosek = $suma / $uk;
        }
        return view("stranice/komponentaN", ['n1' => $n, 'prosek' => $prosek]);
    }

    private function prikazPagin($nump, $page)
    {
        return view("stranice/komponentaPaginacija", ['nump' => $nump, 'page' => $page]);
    }

    public function slStranaNapredno()
    {
        if (isset($_GET['page'])) {
            $tmpPage = $_GET['page'];
            $sve = $this->session->get('sveN');
            $n = count($sve);
            $nump = ceil($n / 10);
            $nek = [];
            foreach ($sve as $id) {
                //echo $id;
                //echo "<br/>";
                array_push($nek, $this->doctrine->em->getRepository(Nekretnina::class)->find($id));
            }
            $zaprikaz = [];
            $i = -1;
            foreach ($nek as $n1) {
                $i += 1;
                if (($i < (($tmpPage - 1) * 10)) || ($i >= (10 * $tmpPage))) {
                    continue;
                }
                array_push($zaprikaz, $n1);

            }

            $proseci = [];
            $brojac = 0;
            foreach ($zaprikaz as $n) {
                $lok = $n->getMikrolokacija()->getIdmikro();
                $tip = $n->getTip()->getIdtipnekretnine();
                $slicne = $this->doctrine->em->getRepository(Nekretnina::class)->nadjiSlicneNekretnine($tip, $lok);
                $suma = 0;
                $prosek = $n->getCena() / $n->getKvadratura();
                $tmpProsek = $prosek;
                if ($slicne != null) {
                    $uk = count($slicne);
                    foreach ($slicne as $sl) {
                        $tmpCena = $sl->getCena() / $sl->getKvadratura();
                        //echo $sl->getIdn();
                        $suma += $tmpCena;
                    }
                    $prosek = $suma / $uk;
                }
                $proseci[$brojac] = $prosek;
                $brojac += 1;
            }
        }
        //echo count($zaprikaz);

        $this->prikaz('rezultatiPretrage', ['rezultati' => $zaprikaz, 'proseci' => $proseci, 'page' => $tmpPage, 'nump' => $nump]);

    }

    public function promenaStranice()
    {
        $tmpPage = $this->request->getVar('page');
        $sve = $this->session->get('sveN');
        $n = count($sve);
        $nek = [];
        foreach ($sve as $id) {
            //echo $id;
            //echo "<br/>";
            array_push($nek, $this->doctrine->em->getRepository(Nekretnina::class)->find($id));
        }
        $n = count($nek);
        $numpages = ceil($n / 10);
        $zaprikaz = [];
        $i = -1;
        foreach ($nek as $n1) {
            $i += 1;
            if (($i < (($tmpPage - 1) * 10)) || ($i >= (10 * $tmpPage))) {
                continue;
            }
            array_push($zaprikaz, $n1);
        }
        $sveNekr = [];

        foreach ($zaprikaz as $n2) {
            array_push($sveNekr, [
                'html' => $this->prikazJedne($n2->getIdn())
            ]);
        }
        array_push($sveNekr, ['html' => $this->prikazPagin($numpages, $tmpPage)]);

        return json_encode($sveNekr);
//        if (isset($_GET['page'])){
//            $tmpPage = $_GET['page'];
//            $sve = $this->session->get('sveN');
//            $n = count($sve);
//            $nump = ceil($n/5);
//            $nek = [];
//            foreach ($sve as $id){
//                //echo $id;
//                //echo "<br/>";
//                array_push($nek,$this->doctrine->em->getRepository(Nekretnina::class)->find($id));
//            }
//            $zaprikaz=[];
//            $i=-1;
//            foreach ($nek as $n1){
//                $i+=1;
//                if (($i<(($tmpPage-1)*5)) || ($i>=(5*$tmpPage))){
//                    continue;
//                }
//                array_push($zaprikaz,$n1);
//            }
//        }


        //$this->prikaz('rezultatiPretrage',['rezultati'=>$zaprikaz,'sve'=>$sve,'page'=>$tmpPage,'nump'=>$nump]);


    }

    public function naprednaPretraga()
    {
        $tipN = $this->doctrine->em->getRepository(Tipnekretnine::class)->findAll();
        //dohvatanje svih lokacija
        $gradovi = $this->doctrine->em->getRepository(Grad::class)->findAll();
        $opstine = $this->doctrine->em->getRepository(Opstina::class)->findAll();
        $mlokacije = $this->doctrine->em->getRepository(Mikrolokacija::class)->findAll();
        $lokacije = [];
        foreach ($gradovi as $g) {
            array_push($lokacije, $g->getNaziv());
        }
        foreach ($opstine as $o) {
            $gr = $o->getGrad()->getNaziv();
            $op = $o->getNaziv();
            $s = "$gr" . "/" . "$op";
            array_push($lokacije, $s);
        }
        foreach ($mlokacije as $lok) {
            $ml = $lok->getNaziv();
            $op = $lok->getOpstina()->getNaziv();
            $gr = $lok->getOpstina()->getGrad()->getNaziv();
            $s = "$gr" . "/" . "$op" . "/" . "$ml";
            array_push($lokacije, $s);
        }

        $this->prikaz('naprednaPretraga', ['tipoviN' => $tipN, 'lokacije' => $lokacije]);
    }

    public function Pogledaj()
    {
        $n = $this->doctrine->em->getRepository(Nekretnina::class)->find($this->request->getVar('idNek'));
        $gradovi = $this->doctrine->em->getRepository(Grad::class)->findAll();
        $tipovi = $this->doctrine->em->getRepository(Tipkorisnika::class)->findAll();

        //racunanje prosecne cene kvadrata na toj lokaciji nekretnine tog tipa
        $lok = $n->getMikrolokacija()->getIdmikro();
        $tip = $n->getTip()->getIdtipnekretnine();
        $slicne = $this->doctrine->em->getRepository(Nekretnina::class)->nadjiSlicneNekretnine($tip, $lok);
        $suma = 0;
        $prosek = $n->getCena() / $n->getKvadratura();
        $tmpProsek = $prosek;
        if ($slicne != null) {
            $uk = count($slicne);
            foreach ($slicne as $sl) {
                $tmpCena = $sl->getCena() / $sl->getKvadratura();
                //echo $sl->getIdn();
                $suma += $tmpCena;
            }
            $prosek = $suma / $uk;
        }
        $zeleno = 0;
        if ($tmpProsek <= $prosek) {
            $zeleno = 1;
        }
        $disOmiljeno = 1;
        if ($this->session->has('korisnik')) {
            $kor = $this->doctrine->em->getRepository(\App\Models\Entities\Korisnik::class)
                ->find($this->session->get('korisnik'));
            $om = $kor->getOmiljene();
            $disOmiljeno = 0;
            foreach ($om as $obj) {
                if ($obj->getIdn() == ($n->getIdn())) {
                    $disOmiljeno = 2;
                    break;
                };
            }

        }


        $this->prikaz('nekretninaDetalji',
            ['nek' => $n, 'prosecnaCena' => $prosek, 'zeleno' => $zeleno, 'disOmiljeno' => $disOmiljeno,'gradovi'=>$gradovi,'tipkorisnika'=>$tipovi]);
    }

    public function izvrsiNapredno()
    {
        $t = $this->request->getVar('izabranTip');
        $cmin = $this->request->getVar('minC');
        $cmaks = $this->request->getVar('maxC');
        $kmaks = $this->request->getVar('maxK');
        $kmin = $this->request->getVar('minK');
        $smin = $this->request->getVar('minS');
        $smaks = $this->request->getVar('maxS');
        $minSpr = $this->request->getVar('minSprat');
        $maxSpr = $this->request->getVar('maxSprat');
        $minG = $this->request->getVar('minG');
        $maxG = $this->request->getVar('maxG');
        $stanje = $this->request->getVar('stanje');
        if ($stanje==null){
            $stanje= "";
        }
        //$stanje = "'lux'";

        if ($cmaks == '') {
            //promeniti
            $cmaks = 10000000;
        } else {
            $cmaks = (int)$cmaks;
        }
        if ($cmin == '') {
            $cmin = 0;
        } else {
            $cmin = (int)$cmin;
        }
        if ($kmaks == '') {
            $kmaks = 100000;
        } else {
            $kmaks = (double)$kmaks;
        }
        if ($kmin == '') {
            $kmin = 0;
        } else {
            $kmin = (int)$kmin;
        }
        if ($smaks == '') {
            $smaks = 100000;
        } else {
            $smaks = (double)$smaks;
        }
        if ($smin == '') {
            $smin = 0;
        } else {
            $smin = (int)$smin;
        }
        if ($maxSpr == '') {
            $maxSpr = 100000;
        } else {
            $maxSpr = (double)$maxSpr;
        }
        if ($minSpr == '') {
            $minSpr = 0;
        } else {
            $minSpr = (int)$minSpr;
        }


        $Tip = $this->doctrine->em->getRepository(Tipnekretnine::class)->findOneBy(['nazivTipa' => $t]);

        $Tip = $Tip->getIdtipnekretnine();

        $l = $this->request->getVar('Lokacija');

        $lokacijePretraga = [];
        $nek = [];
        $b = 0;
        if ($l == null) {
            $b = 1;
        } elseif (count($l) == 1) {
            foreach ($l as $l1) {
                if ($l1 == "") {
                    $b = 1;
                }
            }
        }
        if ($b == 0) {
            foreach ($l as $l1) {
                $string1 = explode("/", $l1);
                $string1 = end($string1);
                $obj = $this->doctrine->em->getRepository(Mikrolokacija::class)->findOneBy(['naziv' => $string1]);
                $x = 'ml';
                if ($obj == null) {
                    $x = 'op';
                    $obj = $this->doctrine->em->getRepository(Opstina::class)->findOneBy(['naziv' => $string1]);

                } else {
                    $obj = $obj->getIdmikro();
                    $nek = array_merge($nek, $this->doctrine->em->getRepository(Nekretnina::class)
                        ->naprednaLokacije($cmin, $cmaks, $kmin, $kmaks, $smin, $smaks, $minSpr, $maxSpr, $obj, $Tip, $minG, $maxG, $stanje));
                    continue;
                }
                if ($obj == null) {
                    $x = 'gr';
                    $obj = $this->doctrine->em->getRepository(Grad::class)->findOneBy(['naziv' => $string1]);
                } else {
                    $obj = $obj->getIdopstine();
                    $nek = array_merge($nek, $this->doctrine->em->getRepository(Nekretnina::class)
                        ->naprednaOpstine($cmin, $cmaks, $kmin, $kmaks, $smin, $smaks, $minSpr, $maxSpr, $obj, $Tip, $minG, $maxG, $stanje));
                    continue;
                }
                $obj = $obj->getIdg();
                $nek = array_merge($nek, $this->doctrine->em->getRepository(Nekretnina::class)
                    ->naprednaGradovi($cmin, $cmaks, $kmin, $kmaks, $smin, $smaks, $minSpr, $maxSpr, $obj, $Tip, $minG, $maxG, $stanje));
                //return $this->doctrine->em->getRepository(Nekretnina::class)->naprednaGradovi($cmin, $cmaks, $kmin, $kmaks, $smin, $smaks, $minSpr, $maxSpr,  $obj, $Tip);

            }
        } else {
            $nek = $this->doctrine->em->getRepository(Nekretnina::class)->naprednoBezLokacije($cmin, $cmaks, $kmin, $kmaks, $smin, $smaks, $minSpr, $maxSpr, $Tip, $minG, $maxG, $stanje);

        }

        rsort($nek);

        $page = 1;
        $n = count($nek);
        $numpages = ceil($n / 10);
        $zaprvu = [];
        $i = 0;
        foreach ($nek as $n1) {
            array_push($zaprvu, $n1);
            $i += 1;
            if ($i == 10) {
                break;
            }

        }
        $ids = [];
        foreach ($nek as $n1) {
            array_push($ids, $n1->getIdn());
        }

        $this->session->set('sveN', $ids);


        $proseci = [];
        $brojac = 0;
        foreach ($zaprvu as $n) {
            $lok = $n->getMikrolokacija()->getIdmikro();
            $tip = $n->getTip()->getIdtipnekretnine();
            $slicne = $this->doctrine->em->getRepository(Nekretnina::class)->nadjiSlicneNekretnine($tip, $lok);
            $suma = 0;
            $prosek = $n->getCena() / $n->getKvadratura();
            $tmpProsek = $prosek;
            if ($slicne != null) {
                $uk = count($slicne);
                foreach ($slicne as $sl) {
                    $tmpCena = $sl->getCena() / $sl->getKvadratura();
                    //echo $sl->getIdn();
                    $suma += $tmpCena;
                }
                $prosek = $suma / $uk;
            }
            $proseci[$brojac] = $prosek;
            $brojac += 1;
        }


        $this->prikaz('rezultatiPretrage', ['rezultati' => $zaprvu, 'proseci' => $proseci, 'page' => $page, 'nump' => $numpages]);

    }

    public function dodajUOmiljene()
    {
        $idkor = $this->session->get('korisnik');
        $kor = $this->doctrine->em->getRepository(\App\Models\Entities\Korisnik::class)->find($idkor);
        $nekr = $this->doctrine->em->getRepository(Nekretnina::class)->find($this->request->getVar('idNek'));

        $o = $kor->getOmiljene();
        //echo $o->count();
        $fleg = 0;
        foreach ($o as $obj) {
            if ($obj->getIdn() == ($nekr->getIdn())) {
                $fleg = -1;
                break;
            };
        }
        if (($fleg != -1) && ($o->count() < 5)) {
            $kor->addOmiljene($nekr);
            //echo "SVE OK";
            $this->doctrine->em->flush($kor);
            return "OK";
        }
        return "NE";


        //$this->prikaz('nekretninaDetalji', ['nek' => $nekr]);


    }

    public function pogledajOmiljenje()
    {
        $kor = $this->doctrine->em->getRepository(\App\Models\Entities\Korisnik::class)->find($this->session->get('korisnik'));
        $o = $kor->getOmiljene();
        $this->prikaz('omiljeneNekretnine', ['rezultati' => $o]);
    }

    public function omiljenaObrada()
    {
        if ($this->request->getVar('dugmeOm') == 'Pogledaj') {
            $n = $this->doctrine->em->getRepository(Nekretnina::class)->find($this->request->getVar('idNek'));
            $this->Pogledaj();
            //$this->prikaz('nekretninaDetalji', ['nek' => $n]);
        } else {
            $kor = $this->doctrine->em->getRepository(\App\Models\Entities\Korisnik::class)->find($this->session->get('korisnik'));
            $kor->removeOmiljena($this->doctrine->em->getRepository(Nekretnina::class)->find($this->request->getVar('idNek')));
            $this->doctrine->em->flush();
            $this->pogledajOmiljenje();


        }
    }

    public function proba()
    {

        //$dir    = base_url()."/slike/nekretnina16";
        $dir = "slike/nekretnina16";
        $files1 = scandir($dir);
        //$files1 = Storage::disk('public')->allFiles('img/animals');
        print_r($files1);
    }

    public function Onama()
    {
        $this->prikaz('oNama', []);
    }
}
