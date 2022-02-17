<?php

namespace App\Controllers;

use App\Models\Entities\Agencija;
use App\Models\Entities\Grad;
use App\Models\Entities\Korisnik;
use App\Models\Entities\Mikrolokacija;
use App\Models\Entities\Nekretnina;
use App\Models\Entities\Opstina;
use App\Models\Entities\Tipkorisnika;
use App\Models\Entities\Ulica;

class Administrator extends BaseController
{
    public function index()
    {
        $k = 0;
        $regzahtevi = $this->doctrine->em->getRepository(Korisnik::class)->findBy(['status' => 0]);

        $korisnici = $this->doctrine->em->getRepository(Korisnik::class)->findBy(['status' => [1, 2]]);
        //$tl = [];
//        foreach ($korisnici as $kor) {
//            array_push($tl, $kor);
//            echo $kor->getKorIme();
//            echo "<br/>";
//        }

        //echo $this->session->get('korisnik');
        $this->prikaz('administrator', ['zahtevi' => $regzahtevi, 'korisnici' => $korisnici]);

    }

    protected function prikaz($page, $data)
    {
        $data['controller'] = 'Administrator';
        echo view("sabloni/headerAdmin");
        echo view("stranice/$page", $data);
        echo view("sabloni/footer");

    }

    public function obradi()
    {
        if ($this->request->getVar('dugme') == 'prihvati') {
            $korisnik = $this->request->getVar('idKor');
            $korisnik1 = $this->doctrine->em->getRepository(Korisnik::class)->findOneBy(['idK' => $korisnik]);
            $korisnik1->setStatus(1);
            $this->doctrine->em->flush();
            return redirect()->to(site_url('administrator'));

        } else {
            $korisnik = $this->request->getVar('idKor');
            $korisnik = $this->doctrine->em->getRepository(Korisnik::class)->findOneBy(['idK' => $korisnik]);
            $korisnik->setStatus(2);
            $this->doctrine->em->flush();
            return redirect()->to(site_url('administrator'));
        }
    }

    public function azuriranje()
    {
        if ($this->request->getVar('dugme1') == 'Azuriraj') {
            //DODATI AZURIRANJE KORISNIKA
            $gradovi = $this->doctrine->em->getRepository(Grad::class)->findAll();
            $agencije = $this->doctrine->em->getRepository(Agencija::class)->findAll();
            $tipkorisnika = $this->doctrine->em->getRepository(Tipkorisnika::class)->findAll();
            $id = $this->request->getVar('idKor');
            $zaAzuriranje = $this->doctrine->em->getRepository(Korisnik::class)->find($id);
            //return redirect()->to(site_url('adminitrator/azuriranjeKorisnika'));
            $this->prikaz('azuriranjeKorisnika', ['gradovi' => $gradovi, 'tipkorisnika' => $tipkorisnika, 'agencije' => $agencije, 'ka' => $zaAzuriranje]);

        } else if ($this->request->getVar('dugme1') == 'Obrisi') {
            $korisnik = $this->request->getVar('idKor');
            //echo $korisnik;
            $korisnik = $this->doctrine->em->getRepository(Korisnik::class)->find($korisnik);
            //echo $korisnik->getIme();
            //$korisnik = $this->doctrine->em->getRepository(Korisnik::class)->findOneBy(['idK' => $korisnik]);

            $this->doctrine->em->remove($korisnik);
            $this->doctrine->em->flush();
            return redirect()->to(site_url('administrator'));

        }

    }

    public function azuriranjeSubmit()
    {
        $ime = $this->request->getVar('ime');
        $prez = $this->request->getVar('prez');
        $korime = $this->request->getVar('korime');
        $lozinka = $this->request->getVar('loz');
        $grad = $this->request->getVar('gradici');
        $rodjenje = $this->request->getVar('rodjenje');
        $telefon = $this->request->getVar('tel');
        $mejl = $this->request->getVar('mejl');
        $grad = $this->doctrine->em->getRepository(Grad::class)->findOneBy(['naziv' => $grad]);
        $rodjenje = date_create_from_format("Y-m-d", $rodjenje);
        //$tipKor = $this->request->getVar('tip');

        //$tipKor = $this->doctrine->em->getRepository(Tipkorisnika::class)->findOneBy(['tipKorisnika'=>$tipKor]);


        //PROVERA DA LI POSTOJI KORISNIK SA KORISNICKIM IMENOM ILI MEJLOM U BAZI
//        $korisnik1 = $this->doctrine->em->getRepository(Korisnik::class)
//            ->findOneBy(['korIme' => $this->request->getVar('korime')]);
//        if ($korisnik1 != null) {
//            $this->session->set("poruka1", 'Zauzeto korisnicko ime');
//            return redirect()->to(site_url());
//        }
//        $korisnik1 = $this->doctrine->em->getRepository(Korisnik::class)
//            ->findOneBy(['eMail' => $this->request->getVar('mejl')]);
//        if ($korisnik1 != null) {
//            $this->session->set("poruka1", 'Zauzeta email adresa');
//            return redirect()->to(site_url());
//        }
        $korisnik = $this->doctrine->em->getRepository(Korisnik::class)->findOneBy(['korIme' => $this->request->getVar('korime')]);
        $korisnik->setIme($ime);
        $korisnik->setPrezime($prez);
        $korisnik->setKorIme($korime);
        $korisnik->setLozinka($lozinka);
        $korisnik->setIdgrada($grad);
        $korisnik->setTelefon($telefon);
        $korisnik->setDatumRodjenja($rodjenje);
        $korisnik->setEMail($mejl);
        //$korisnik->setStatus(0);
//        $korisnik->setTip($tipKor);
//        if ($tipKor->getTipKorisnika() == 'kupac') {
//            $korisnik->setTip($this->doctrine->em->getRepository(Tipkorisnika::class)->findOneBy(['tipKorisnika' => 'kupac']));
//        } else if ($tipKor->getTipKorisnika() == 'samostalni prodavac') {
//            $korisnik->setTip($this->doctrine->em->getRepository(Tipkorisnika::class)->findOneBy(['tipKorisnika' => 'samostalni prodavac']));
//        } else {
//            $korisnik->setTip($this->doctrine->em->getRepository(Tipkorisnika::class)->findOneBy(['tipKorisnika' => 'agent']));
//            $agencija = $this->request->getVar('agencije1');
//            $agencija = $this->doctrine->em->getRepository(Agencija::class)->findOneBy(['naziv' => $agencija]);
//
//            $licenca = $this->request->getVar('brlicence');
//            $korisnik->setBrLicence($licenca);
//            $korisnik->setIdagencije($agencija);
//
//        }
        $a = $this->request->getVar('agencije1');
//        if (isset($a) && ($a!='') && (!empty($a))){
//            $agencija = $this->request->getVar('agencije1');
//            $agencija = $this->doctrine->em->getRepository(Agencija::class)->findOneBy(['naziv' => $agencija]);
//
//            $licenca = $this->request->getVar('brlicence');
//            $korisnik->setBrLicence($licenca);
//            $korisnik->setIdagencije($agencija);
//        }
        echo $ime;
        echo $prez;
        echo $korime;
        echo $grad->getNaziv();
        echo "<br/>";
        echo $rodjenje->format("Y-m-d");
        echo "<br/>";
        echo $mejl;
        echo $lozinka;


        //$this->doctrine->em->persist($korisnik);
        //$this->doctrine->em->flush();

        //return redirect()->to(site_url("administrator"));
    }


    public function noviKorisnikAdmin()
    {

        $gradovi = $this->doctrine->em->getRepository(Grad::class)->findAll();
        $agencije = $this->doctrine->em->getRepository(Agencija::class)->findAll();
        $tipkorisnika = $this->doctrine->em->getRepository(Tipkorisnika::class)->findAll();
        $this->prikaz('noviKorisnik', ['gradovi' => $gradovi, 'tipkorisnika' => $tipkorisnika, 'agencije' => $agencije]);
    }

    public function kreirajKorisnika()
    {
        $this->session->set("poruka1", '');
        $ime = $this->request->getVar('ime');
        $prez = $this->request->getVar('prez');
        $korime = $this->request->getVar('korime');
        $lozinka = $this->request->getVar('loz');
        $grad = $this->request->getVar('gradici');
        $rodjenje = $this->request->getVar('rodjenje');
        $telefon = $this->request->getVar('tel');
        $mejl = $this->request->getVar('mejl');
        $grad = $this->doctrine->em->getRepository(Grad::class)->findOneBy(['naziv' => $grad]);
        $rodjenje = date_create_from_format("Y-m-d", $rodjenje);
        $tipKor = $this->request->getVar('tip');

        $tipKor = $this->doctrine->em->getRepository(Tipkorisnika::class)->findOneBy(['tipKorisnika' => $tipKor]);


        //PROVERA DA LI POSTOJI KORISNIK SA KORISNICKIM IMENOM ILI MEJLOM U BAZI
        $korisnik1 = $this->doctrine->em->getRepository(Korisnik::class)
            ->findOneBy(['korIme' => $this->request->getVar('korime')]);
        if ($korisnik1 != null) {
            $this->session->set("poruka1", 'Zauzeto korisnicko ime');
            return redirect()->to(site_url());
        }
        $korisnik1 = $this->doctrine->em->getRepository(Korisnik::class)
            ->findOneBy(['eMail' => $this->request->getVar('mejl')]);
        if ($korisnik1 != null) {
            $this->session->set("poruka1", 'Zauzeta email adresa');
            return redirect()->to(site_url());
        }
        $korisnik = new Korisnik();
        $korisnik->setIme($ime);
        $korisnik->setPrezime($prez);
        $korisnik->setKorIme($korime);
        $korisnik->setLozinka($lozinka);
        $korisnik->setIdgrada($grad);
        $korisnik->setTelefon($telefon);
        $korisnik->setDatumRodjenja($rodjenje);
        $korisnik->setEMail($mejl);
        $korisnik->setStatus(0);
        $korisnik->setTip($tipKor);
        if ($tipKor->getTipKorisnika() == 'kupac') {
            $korisnik->setTip($this->doctrine->em->getRepository(Tipkorisnika::class)->findOneBy(['tipKorisnika' => 'kupac']));
        } else if ($tipKor->getTipKorisnika() == 'samostalni prodavac') {
            $korisnik->setTip($this->doctrine->em->getRepository(Tipkorisnika::class)->findOneBy(['tipKorisnika' => 'samostalni prodavac']));
        } else {
            $korisnik->setTip($this->doctrine->em->getRepository(Tipkorisnika::class)->findOneBy(['tipKorisnika' => 'agent']));
            $agencija = $this->request->getVar('agencije1');
            $agencija = $this->doctrine->em->getRepository(Agencija::class)->findOneBy(['naziv' => $agencija]);

            $licenca = $this->request->getVar('brlicence');
            $korisnik->setBrLicence($licenca);
            $korisnik->setIdagencije($agencija);

        }


        echo $ime;
        echo $prez;
        echo $korime;
        echo $grad->getNaziv();
        echo "<br/>";
        echo $rodjenje->format("Y-m-d");
        echo "<br/>";
        echo $mejl;
        echo $lozinka;


        $this->doctrine->em->persist($korisnik);
        $this->doctrine->em->flush();

        return redirect()->to(site_url("administrator"));
    }

    public function novaAgencijaAdmin()
    {
        $gradovi = $this->doctrine->em->getRepository(Grad::class)->findAll();
        $this->prikaz('novaAgencija', ['gradovi' => $gradovi]);
    }

    public function kreirajAgenciju()
    {
        $ime = $this->request->getVar('imeAg');
        $grad = $this->request->getVar('gradici');
        $grad = $this->doctrine->em->getRepository(Grad::class)->findOneBy(['naziv' => $grad]);
        $pib = $this->request->getVar('pib');
        $tel = $this->request->getVar('telAg');
        $adr = $this->request->getVar('adrAg');
        $agencija = new Agencija();
        $agencija->setNaziv($ime);
        $agencija->setTelefon($tel);
        $agencija->setIdgrada($grad);
        $agencija->setPib($pib);
        $agencija->setAdresa($adr);

        $this->doctrine->em->persist($agencija);
        $this->doctrine->em->flush();

        return redirect()->to(site_url("administrator"));

    }

    public function novaLokacijaAdmin()
    {
        $sveLok = $this->doctrine->em->getRepository(Mikrolokacija::class)->findAll();
        $prazne=[];
        foreach ($sveLok as $l){
            $n = $this->doctrine->em->getRepository(Nekretnina::class)->findBy(['mikrolokacija'=>$l]);
            if ($n==null){
                array_push($prazne,$l);

            }
        }

        $grad = $this->doctrine->em->getRepository(Grad::class)->findAll();
        $this->prikaz('dodajMikrolokaciju', ['gradovi' => $grad,'prazneLok'=>$prazne]);
    }

    public function dodajMikro()
    {
        //$grad = $this->request->getVar('gr');
        $o = $this->doctrine->em->getRepository(Opstina::class)->find($this->request->getVar('opst'));
        $naziv = $this->request->getVar('naziv');
        //$m = $this->doctrine->em->getRepository(Mikrolokacija::class)->findOneBy(['naziv' => $naziv]);

        $lokacija = new Mikrolokacija();
        $lokacija->setOpstina($o);
        $lokacija->setNaziv($naziv);
        $this->doctrine->em->persist($lokacija);
        $this->doctrine->em->flush();
        return redirect()->to(site_url("administrator"));


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

    public function novaUlicaAdmin(){
        $ulice =$this->doctrine->em->getRepository(Ulica::class)->findAll();
        $grad = $this->doctrine->em->getRepository(Grad::class)->findAll();

        $prazne=[];
        foreach ($ulice as $u){
            $n = $this->doctrine->em->getRepository(Nekretnina::class)->findBy(['ulica'=>$u]);
            if ($n==null){
                array_push($prazne,$u);

            }
        }
        $this->prikaz('dodajUlicu', ['gradovi' => $grad,'prazneUlice'=>$prazne]);

    }

    public function dodajUl(){
        $m = $this->doctrine->em->getRepository(Mikrolokacija::class)->find($this->request->getVar('lok'));
        $naziv = $this->request->getVar('naziv');
        //$m = $this->doctrine->em->getRepository(Mikrolokacija::class)->findOneBy(['naziv' => $naziv]);

        $lokacija = new Ulica();
        $lokacija->setMikrolokacija($m);
        $lokacija->setNaziv($naziv);
        $this->doctrine->em->persist($lokacija);
        $this->doctrine->em->flush();
        return redirect()->to(site_url("administrator"));
    }


    public function brisanjeMikrolokacije(){
        $lokacija = $this->doctrine->em->getRepository(Mikrolokacija::class)->find($this->request->getVar('idLok'));
        $this->doctrine->em->remove($lokacija);
        $this->doctrine->em->flush();
        return redirect()->to(site_url("administrator/novaLokacijaAdmin"));


    }

    public function brisanjeUlice(){
        $ulica = $this->doctrine->em->getRepository(Ulica::class)->find($this->request->getVar('idU'));
        $this->doctrine->em->remove($ulica);
        $this->doctrine->em->flush();
        return redirect()->to(site_url("administrator/novaUlicaAdmin"));
    }
}