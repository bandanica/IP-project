<?php

namespace App\Controllers;

use App\Models\Entities\Agencija;
use App\Models\Entities\Grad;
use App\Models\Entities\Korisnik;
use App\Models\Entities\Nekretnina;
use App\Models\Entities\Tipkorisnika;
use function Webmozart\Assert\Assert;

class Login extends BaseController
{
    public function index()
    {
        $gradovi = $this->doctrine->em->getRepository(Grad::class)->findAll();
        $agencije = $this->doctrine->em->getRepository(Agencija::class)->findAll();
        $tipkorisnika = $this->doctrine->em->getRepository(Tipkorisnika::class)->findAll();

        $poslednjeNekretnine = $this->doctrine->em->getRepository(Nekretnina::class)->findLatest();
        $poslednjiOglasi = [];
        //nalazenje poslednjih 5 nekretnina
        $i=0;
        foreach ($poslednjeNekretnine as $n){
            $i=$i+1;
            //$nek1 = new Nekretnine($n);
            array_push($poslednjiOglasi,$n);
            if ($i===5){
                break;
            }
        }
        $indexAdmin = -1;
        foreach ($tipkorisnika as $t) {
            $indexAdmin += 1;
            if ($t->getTipKorisnika() == "administrator") {
                break;
            }
        }

        unset($tipkorisnika[$indexAdmin]);
        $poruka = $this->session->get("poruka");
        $poruka1 = $this->session->get("poruka1");
        $porukaL = $this->session->get("porukaLozinka");
        $this->session->set("poruka", '');
        $this->session->set("poruka1", '');
        $this->session->set("porukaLozinka", '');
        return $this->prikaz('index', ['gradovi' => $gradovi, 'poruka' => $poruka, 'poruka1' => $poruka1,
            'tipkorisnika' => $tipkorisnika, 'agencije' => $agencije, 'porukaL' => $porukaL, 'nekretnine' => $poslednjiOglasi]);

        //return $this->prikaz('index', ['gradovi' => $gradovi, 'poruka' => $poruka, 'poruka1' => $poruka1, 'tipkorisnika' => $tipkorisnika, 'agencije' => $agencije, 'porukaL' => $porukaL, 'poslednjOgl'=>$poslednjiOglasi]);
    }

    protected function prikaz($page, $data)
    {
        $data['controller'] = 'Login';
        return view("stranice/$page", $data);
    }

    public function log($puruka = null)
    {
        return $this->prikaz('index', ['poruka' => $puruka]);
    }

    public function login()
    {
        $this->session->set("poruka", '');

        $korisnik = $this->doctrine->em->getRepository(Korisnik::class)
            ->findOneBy(['korIme' => $this->request->getVar('kor_ime')]);
        if ($korisnik == null) {
            $this->session->set("poruka", 'Korisnik ne postoji');
            return redirect()->to(site_url());
        }
        if (($korisnik->getLozinka()) != ($this->request->getVar('lozinka'))) {
            $this->session->set("poruka", 'Pogresna lozinka');
            return redirect()->to(site_url());
        }
        if ($korisnik->getStatus() == 0) {
            $this->session->set("poruka", 'Vas zahtev za registracijom jos uvek nije odobren od administratora.Pokusajte ponovo kasnije.');
            return redirect()->to(site_url());
        }
        if ($korisnik->getStatus() == 2) {
            $this->session->set("poruka", 'Vas zahtev za registracijom je odbijen. Molimo vas registrujte se ponovo.');
            return redirect()->to(site_url());
        }
        //$korisnik->getIdgrada()->getNaziv();
        $zaSesiju = $korisnik->getIdK();

        $this->session->set('korisnik', $zaSesiju);

        if ($korisnik->getTip()->getTipKorisnika() == "kupac") {
            return redirect()->to(site_url('korisnik'));
        }
        if ($korisnik->getTip()->getTipKorisnika() == "administrator") {
            return redirect()->to(site_url('administrator'));
        } else {
            return redirect()->to(site_url('oglasivac'));
        }
    }

    public function registerSubmit()
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
        if ($tipKor === 'kupac') {
            $korisnik->setTip($this->doctrine->em->getRepository(Tipkorisnika::class)->findOneBy(['tipKorisnika' => 'kupac']));
        } else if ($tipKor === 'samostalni prodavac') {
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

        return redirect()->to(site_url("login/registrovan"));
    }

    public function registrovan()
    {
        return $this->prikaz("kreiranKorisnik", []);
    }

    public function logout()
    {
        $this->session->remove('korisnik');
        return redirect()->to(site_url());
    }
}