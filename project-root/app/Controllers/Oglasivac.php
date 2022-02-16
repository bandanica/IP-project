<?php

namespace App\Controllers;

use App\Models\EntitetiZaProsledjivanje\Nekretnine;
use App\Models\Entities\Agencija;
use App\Models\Entities\Grad;
use App\Models\Entities\Karakteristike;
use App\Models\Entities\Mikrolokacija;
use App\Models\Entities\Nekretnina;
use App\Models\Entities\Opstina;
use App\Models\Entities\Tipkorisnika;
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

        $this->prikaz('oglasivac', ['poruka2' => $poruka, 'mojenekretnine' => $nekretnine]);
    }

    protected function prikaz($page, $data)
    {
        $data['controller'] = 'Oglasivac';
        echo view("sabloni/headerOglasivac");
        echo view("stranice/$page", $data);
        echo view("sabloni/footer");
    }

    public function promenaLozinke()
    {
        $this->prikaz('promenaSifre', []);
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
        $tipN = $this->doctrine->em->getRepository(Tipnekretnine::class)->findAll();
        $gradovi = $this->doctrine->em->getRepository(Grad::class)->findAll();
        $this->prikaz('dodavanjeNekretnine', ['gradovi' => $gradovi, 'tipoviN'=>$tipN]);
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
        //$putanja = "slike/profilna.png";
        //$ime = $_FILES["izaberiSliku"]["name"];
        //echo $ime;



        $ime = $this->request->getVar('nazivN');
        $grad = $this->doctrine->em->getRepository(Grad::class)->find($this->request->getVar('gr'));
        $opstina = $this->doctrine->em->getRepository(Opstina::class)->find($this->request->getVar('opst'));
        $lokacija = $this->doctrine->em->getRepository(Mikrolokacija::class)->find($this->request->getVar('lok'));
        $ulica = $this->doctrine->em->getRepository(Ulica::class)->find($this->request->getVar('ul'));
        $kv = (int)$this->request->getVar('kvadratura');
        $sobe = (int)$this->request->getVar('brsoba');
        $gi = $this->request->getVar('dizgradnje');
        $gi = date_create_from_format("Y-m-d", $gi);
//        $gi = new DateTime;
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
        $grejanje = $this->request->getVar('grej');
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
        $nekretninaN->setNaziv($ime);
        $nekretninaN->setKvadratura($kv);
        $nekretninaN->setStanje($stanjen);
        $nekretninaN->setSprat($sprat);
        $nekretninaN->setUkupnaSpratnost($uks);
        $nekretninaN->setOpis($opis);
        $nekretninaN->setMesecniTroskovi($mtroskovi);
        $nekretninaN->setOpstina($opstina);
        $nekretninaN->setMikrolokacija($lokacija);
        $nekretninaN->setUlica($ulica);
        $oglasivac = $this->doctrine->em->getRepository(\App\Models\Entities\Korisnik::class)->find($this->session->get("korisnik"));
        //echo $oglasivac->getIdK();
        $nekretninaN->setOglasivac($oglasivac);
        //$ag = $oglasivac->getIdagencije();

        $nekretninaN->setAgencija($oglasivac->getIdagencije());



        //$idS = (int) $nekretninaN->getIdn();
        //$idS=5;

        //echo $putanja;
        $tipnekr = $this->request->getVar("izabranTip");

        $tipnekr = $this->doctrine->em->getRepository(Tipnekretnine::class)->findOneBy(['nazivTipa' => $tipnekr]);
        $nekretninaN->setTip($tipnekr);
        $this->doctrine->em->persist($nekretninaN);
        $this->doctrine->em->flush();

        $data=[];
        $idS = (int) $nekretninaN->getIdn();
        $putanja = 'slike/profilna.png';

        $fajlovi = $_FILES["izaberiSliku"]['name'];

        //OVO URADITI U JS!!!
        if (count($fajlovi)<3){
            echo "MORAJU DA SE UNESU BAR 3 SLIKE";
        }
        if (count($fajlovi)>6){
            echo "NAJVISE DOZVOLJENO 6 slika";
        }

        if (count($fajlovi)>=3 && count($fajlovi)<=6){
            $names = $_FILES['izaberiSliku']['name'];
            $sizes = $_FILES['izaberiSliku']['size'];
            $tmp_names = $_FILES['izaberiSliku']['tmp_name'];
            $m = count($names);
            for ($i=0;$i<$m;$i++){
                if ($sizes[$i]!=0){
                    $putanja = $this->uzmiPutanju($data,$idS,$names[$i],$sizes[$i],$tmp_names[$i]);
                    //echo $putanja;
                    //echo "<br/>";
                }
            }

        }

        //$fileNames = array_filter($_FILES['izaveriSliku']['name']);
        //echo gettype($fileNames);
        //echo "SVE Ok";
//        if ($_FILES["izaberiSliku"]["size"] != 0) {
//            $putanja = $this->uzmiPutanju($data,$idS);
//        }
        //echo "Uspesno";
        //echo "<br/>";
        //echo $putanja;

        $putanja= "slike/nekretnina"."$idS"."/";
        $nekretninaN->setSlike($putanja);
        $this->doctrine->em->flush();
        return redirect()->to(site_url("oglasivac"));

    }

    protected function uzmiPutanju(&$greska, $id,$name,$size,$tmp_name): string
    {

        $target_dir = "slike/nekretnina"."$id"."/";
        if (!is_dir($target_dir)){
            mkdir($target_dir);
        }
        $target_file = $target_dir . basename($name);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($tmp_name);

        if ($check == false) {
            $greska['GreskaSlika'] = 'Fajl koji ste prilozili nije slika!';
            return "";
        }

        if ($size > 1000000) {
            $greska['GreskaSlika'] = 'Slika koju ste prilozili je veca od 1mb!';
            return "";
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $greska['GreskaSlika'] = 'Slika nije u formatu JPG, JPEG ili PNG!';
            return "";
        }

        if (move_uploaded_file($tmp_name, $target_file)) {
            return $target_file;
        } else {
            $greska['GreskaSlika'] = 'Desila se greska pri ucitavanju slike!';
            return "";
        }
    }

    public function Obradi(){
        if ($this->request->getVar('dugmeNek')=='prodato'){
            $n = $this->request->getVar('idNek');
            $n = $this->doctrine->em->getRepository(Nekretnina::class)->find($n);
            $n->setStatus('Prodato');
            $this->doctrine->em->flush();
            return redirect()->to(site_url("oglasivac"));
        }
        else{
            $n = $this->doctrine->em->getRepository(Nekretnina::class)->find($this->request->getVar('idNek'));
            $g = $this->doctrine->em->getRepository(Grad::class)->findAll();
            $this->prikaz('azuriranjeNekretnine',['nek'=>$n,'gradovi'=>$g]);
        }
    }

    public function podaciIzmena(){
        $id=$this->session->get('korisnik');
        $korisnik = $this->doctrine->em->getRepository(\App\Models\Entities\Korisnik::class)->find($id);
        $tipkorisnika = $this->doctrine->em->getRepository(Tipkorisnika::class)->findAll();
        $indexAdmin = 0;
        $indexKupac = 0;
        $kk=0;
        $ka=0;
        foreach ($tipkorisnika as $t) {
            if (($t->getTipKorisnika() != "kupac") && ($kk==0)) {
                $indexKupac +=1;
            }
            else if ($t->getTipKorisnika() == "kupac"){

                $kk=1;
            }

            if (($t->getTipKorisnika() != "administrator") && ($ka==0)) {
                $indexAdmin += 1;
            }
            else if ($t->getTipKorisnika() == "administrator"){
                $ka=1;
            }
            if ($ka!=0 && $kk!=0){
                break;
            }

        }
        unset($tipkorisnika[$indexAdmin]);
        unset($tipkorisnika[$indexKupac]);
        $ag = $this->doctrine->em->getRepository(Agencija::class)->findAll();

        $this->prikaz('podaciOglasivaca', ['podaci'=>$korisnik,'agencije'=>$ag,'tipkorisnika'=>$tipkorisnika]);
    }

    public function zavrsiAzuriranje(){
        $nekretninaN = $this->doctrine->em->getRepository(Nekretnina::class)->find($this->request->getVar('idN'));
        $kar = $nekretninaN->getKarakteristike();
        $ime = $this->request->getVar('nazivN');
        $kv = (int)$this->request->getVar('kvadratura');
        $sobe = (int)$this->request->getVar('brsoba');
        $gi = $this->request->getVar('dizgradnje');
        $gi = date_create_from_format("Y-m-d", $gi);
        $stanjen = $this->request->getVar('stanje');
        $sprat = (int)$this->request->getVar('sprat');
        $uks = (int)$this->request->getVar('ukspratnost');
        $opis = $this->request->getVar('opisNek');
        $mtroskovi = $this->request->getVar('mesTroskovi');
        $c = (int)$this->request->getVar('cenaNekretnine');
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
        $grejanje = $this->request->getVar('grej');
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
        //$kar = new Karakteristike();
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

        $nekretninaN->setParking($p);

        $nekretninaN->setBrSoba($sobe);
        $nekretninaN->setCena($c);
        $nekretninaN->setGodinaIzgradnje($gi);
        $nekretninaN->setGrejanje($grejanje);
        $nekretninaN->setKarakteristike($kar);
        //$nekretninaN->setGradid($grad);
        $nekretninaN->setNaziv($ime);
        $nekretninaN->setKvadratura($kv);
        $nekretninaN->setStanje($stanjen);
        $nekretninaN->setSprat($sprat);
        $nekretninaN->setUkupnaSpratnost($uks);
        $nekretninaN->setOpis($opis);
        $nekretninaN->setMesecniTroskovi($mtroskovi);
        //$nekretninaN->setOpstina($opstina);
        //$nekretninaN->setMikrolokacija($lokacija);
        //$nekretninaN->setUlica($ulica);
        $this->doctrine->em->flush();
        return redirect()->to(site_url("oglasivac"));

    }

    public function promenaSubmit(){
        //$idK = $this->request->getVar('idKor');
        $idK = $this->session->get('korisnik');
        $korisnik = $this->doctrine->em->getRepository(\App\Models\Entities\Korisnik::class)->find($idK);
        $tel = $this->request->getVar('tel');
        $mejl = $this->request->getVar('mejl');
        $tip = $this->request->getVar('tip');
        $tip = $this->doctrine->em->getRepository(Tipkorisnika::class)->findOneBy(['tipKorisnika'=>$tip]);
        if ($tip->getTipkorisnika()=='agent'){

            $a = $this->request->getVar('agencije1');
            $a = $this->doctrine->em->getRepository(Agencija::class)->findOneBy(['naziv'=>$a]);
            $br = $this->request->getVar('brlicence1');
            $korisnik->setIdagencije($a);
            $korisnik->setBrLicence($br);
        }
        else{
            $korisnik->setIdagencije(null);
            $korisnik->setBrLicence(null);

        }
        $korisnik->setTelefon($tel);
        $korisnik->setEMail($mejl);
        $korisnik->setTip($tip);
        $this->doctrine->em->flush();
        echo "SVE OK";
    }
}