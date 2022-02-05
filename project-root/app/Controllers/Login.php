<?php

namespace App\Controllers;

use App\Models\Entities\Grad;
use App\Models\Entities\Korisnik;
use App\Models\Entities\Tipkorisnika;

class Login extends BaseController
{
    public function index()
    {
        $gradovi = $this->doctrine->em->getRepository(Grad::class)->findAll();
        $poruka = $this->session->get("poruka");
        $this->session->set("poruka", '');
        return $this->prikaz('index', ['gradovi' => $gradovi, 'poruka' => $poruka]);
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
        $this->session->set('korisnik', $korisnik->getIme());

        if ($korisnik->getTip()->getTipKorisnika() == "kupac") {
            return redirect()->to(site_url('korisnik'));
        }
        if ($korisnik->getTip()->getTipKorisnika() == "kupac") {
            return redirect()->to(site_url('korisnik'));
        }
    }

    public function registerSubmit()
    {
        $this->session->set("poruka", '');
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
        $korisnik->setTip($this->doctrine->em->getRepository(Tipkorisnika::class)->findOneBy(['tipKorisnika' => 'kupac']));

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
}