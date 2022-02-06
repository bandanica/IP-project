<?php

namespace App\Models\EntitetiZaProsledjivanje;

use App\Models\Entities\Agencija;
use App\Models\Entities\Grad;
use App\Models\Entities\Karakteristike;
use App\Models\Entities\Korisnik;
use App\Models\Entities\Mikrolokacija;
use App\Models\Entities\Nekretnina;
use App\Models\Entities\Opstina;
use App\Models\Entities\Tipnekretnine;
use App\Models\Entities\Ulica;

class Nekretnine
{

    private $idn;
    private $kvadratura;
    private $brSoba;
    private $godinaIzgradnje;
    private $sprat;
    private $ukupnaSpratnost;
    private $parking;
    private $stanje;
    private $grejanje;
    private $mesecniTroskovi;
    private $opis;
    private $naziv;
    private $status;
    private $mikrolokacija;
    private $opstina;
    private $agencija;
    private $ulica;
    private $karakteristike;
    private $oglasivac;
    private $tip;
    private $gradid;
    private $cena;

    /**
     * @param $idn
     * @param $kvadratura
     * @param $brSoba
     * @param $godinaIzgradnje
     * @param $sprat
     * @param $ukupnaSpratnost
     * @param $parking
     * @param $stanje
     * @param $grejanje
     * @param $mesecniTroskovi
     * @param $opis
     * @param $naziv
     * @param $status
     * @param $mikrolokacija
     * @param $opstina
     * @param $agencija
     * @param $ulica
     * @param $karakteristike
     * @param $oglasivac
     * @param $tip
     * @param $gradid
     */
    public function __construct($nek)
    {
        $this->idn = $nek->getIdn();
        $this->kvadratura = $nek->getKvadratura();
        $this->brSoba = $nek->getBrSoba();
        $this->godinaIzgradnje = $nek->getGodinaIzgradnje();
        $this->sprat = $nek->getSprat();
        $this->ukupnaSpratnost = $nek->getUkupnaSpratnost();
        $this->parking = $nek->getParking();
        $this->stanje = $nek->getStanje();
        $this->grejanje = $nek->getGrejanje();
        $this->mesecniTroskovi = $nek->getMesecniTroskovi();
        $this->opis = $nek->getOpis();
        $this->naziv = $nek->getNaziv();
        $this->status = $nek->getStatus();
        $this->mikrolokacija = $nek->getMikrolokacija();
        $this->opstina = $nek->getOpstina();
        $this->agencija = $nek->getAgencija();
        $this->ulica = $nek->getUlica();
        $this->karakteristike = $nek->getKarakteristike();
        $this->oglasivac = $nek->getOglasivac();
        $this->tip = $nek->getTip();
        $this->gradid = $nek->getGradid();
        $this->cena = $nek->getCena();
    }

    /**
     * @return mixed
     */
    public function getIdn()
    {
        return $this->idn;
    }

    /**
     * @param mixed $idn
     */
    public function setIdn($idn): void
    {
        $this->idn = $idn;
    }

    /**
     * @return mixed
     */
    public function getCena()
    {
        return $this->cena;
    }

    /**
     * @param mixed $idn
     */
    public function setCena($cena): void
    {
        $this->cena = $cena;
    }
    /**
     * @return mixed
     */
    public function getKvadratura()
    {
        return $this->kvadratura;
    }

    /**
     * @param mixed $kvadratura
     */
    public function setKvadratura($kvadratura): void
    {
        $this->kvadratura = $kvadratura;
    }

    /**
     * @return mixed
     */
    public function getBrSoba()
    {
        return $this->brSoba;
    }

    /**
     * @param mixed $brSoba
     */
    public function setBrSoba($brSoba): void
    {
        $this->brSoba = $brSoba;
    }

    /**
     * @return mixed
     */
    public function getGodinaIzgradnje()
    {
        return $this->godinaIzgradnje;
    }

    /**
     * @param mixed $godinaIzgradnje
     */
    public function setGodinaIzgradnje($godinaIzgradnje): void
    {
        $this->godinaIzgradnje = $godinaIzgradnje;
    }

    /**
     * @return mixed
     */
    public function getSprat()
    {
        return $this->sprat;
    }

    /**
     * @param mixed $sprat
     */
    public function setSprat($sprat): void
    {
        $this->sprat = $sprat;
    }

    /**
     * @return mixed
     */
    public function getUkupnaSpratnost()
    {
        return $this->ukupnaSpratnost;
    }

    /**
     * @param mixed $ukupnaSpratnost
     */
    public function setUkupnaSpratnost($ukupnaSpratnost): void
    {
        $this->ukupnaSpratnost = $ukupnaSpratnost;
    }

    /**
     * @return mixed
     */
    public function getParking()
    {
        return $this->parking;
    }

    /**
     * @param mixed $parking
     */
    public function setParking($parking): void
    {
        $this->parking = $parking;
    }

    /**
     * @return mixed
     */
    public function getStanje()
    {
        return $this->stanje;
    }

    /**
     * @param mixed $stanje
     */
    public function setStanje($stanje): void
    {
        $this->stanje = $stanje;
    }

    /**
     * @return mixed
     */
    public function getGrejanje()
    {
        return $this->grejanje;
    }

    /**
     * @param mixed $grejanje
     */
    public function setGrejanje($grejanje): void
    {
        $this->grejanje = $grejanje;
    }

    /**
     * @return mixed
     */
    public function getMesecniTroskovi()
    {
        return $this->mesecniTroskovi;
    }

    /**
     * @param mixed $mesecniTroskovi
     */
    public function setMesecniTroskovi($mesecniTroskovi): void
    {
        $this->mesecniTroskovi = $mesecniTroskovi;
    }

    /**
     * @return mixed
     */
    public function getOpis()
    {
        return $this->opis;
    }

    /**
     * @param mixed $opis
     */
    public function setOpis($opis): void
    {
        $this->opis = $opis;
    }

    /**
     * @return mixed
     */
    public function getNaziv()
    {
        return $this->naziv;
    }

    /**
     * @param mixed $naziv
     */
    public function setNaziv($naziv): void
    {
        $this->naziv = $naziv;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getMikrolokacija()
    {
        return $this->mikrolokacija;
    }

    /**
     * @param mixed $mikrolokacija
     */
    public function setMikrolokacija($mikrolokacija): void
    {
        $this->mikrolokacija = $mikrolokacija;
    }

    /**
     * @return mixed
     */
    public function getOpstina()
    {
        return $this->opstina;
    }

    /**
     * @param mixed $opstina
     */
    public function setOpstina($opstina): void
    {
        $this->opstina = $opstina;
    }

    /**
     * @return mixed
     */
    public function getAgencija()
    {
        return $this->agencija;
    }

    /**
     * @param mixed $agencija
     */
    public function setAgencija($agencija): void
    {
        $this->agencija = $agencija;
    }

    /**
     * @return mixed
     */
    public function getUlica()
    {
        return $this->ulica;
    }

    /**
     * @param mixed $ulica
     */
    public function setUlica($ulica): void
    {
        $this->ulica = $ulica;
    }

    /**
     * @return mixed
     */
    public function getKarakteristike()
    {
        return $this->karakteristike;
    }

    /**
     * @param mixed $karakteristike
     */
    public function setKarakteristike($karakteristike): void
    {
        $this->karakteristike = $karakteristike;
    }

    /**
     * @return mixed
     */
    public function getOglasivac()
    {
        return $this->oglasivac;
    }

    /**
     * @param mixed $oglasivac
     */
    public function setOglasivac($oglasivac): void
    {
        $this->oglasivac = $oglasivac;
    }

    /**
     * @return mixed
     */
    public function getTip()
    {
        return $this->tip;
    }

    /**
     * @param mixed $tip
     */
    public function setTip($tip): void
    {
        $this->tip = $tip;
    }

    /**
     * @return mixed
     */
    public function getGradid()
    {
        return $this->gradid;
    }

    /**
     * @param mixed $gradid
     */
    public function setGradid($gradid): void
    {
        $this->gradid = $gradid;
    }



}