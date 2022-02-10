<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nekretnina
 *
 * @ORM\Table(name="nekretnina", uniqueConstraints={@ORM\UniqueConstraint(name="idN_UNIQUE", columns={"idN"})}, indexes={@ORM\Index(name="oglasivacID", columns={"oglasivac"}), @ORM\Index(name="tipNekr", columns={"tip"}), @ORM\Index(name="agencijaID", columns={"agencija"}), @ORM\Index(name="karakt", columns={"karakteristike"}), @ORM\Index(name="opst", columns={"opstina"}), @ORM\Index(name="ul", columns={"ulica"}), @ORM\Index(name="grd", columns={"gradID"}), @ORM\Index(name="mikrlok", columns={"mikrolokacija"})})
 * @ORM\Entity(repositoryClass="App\Models\Repositories\NekretninaRepository")
 */
class Nekretnina
{
    /**
     * @var int
     *
     * @ORM\Column(name="idN", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idn;

    /**
     * @var int|null
     *
     * @ORM\Column(name="kvadratura", type="integer", nullable=true)
     */
    private $kvadratura;

    /**
     * @var int|null
     *
     * @ORM\Column(name="br_soba", type="integer", nullable=true)
     */
    private $brSoba;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="godina_izgradnje", type="datetime", nullable=true)
     */
    private $godinaIzgradnje;

    /**
     * @var int|null
     *
     * @ORM\Column(name="sprat", type="integer", nullable=true)
     */
    private $sprat;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ukupna_spratnost", type="integer", nullable=true)
     */
    private $ukupnaSpratnost;

    /**
     * @var string|null
     *
     * @ORM\Column(name="parking", type="string", length=45, nullable=true)
     */
    private $parking;

    /**
     * @var string|null
     *
     * @ORM\Column(name="stanje", type="string", length=45, nullable=true)
     */
    private $stanje;

    /**
     * @var string|null
     *
     * @ORM\Column(name="grejanje", type="string", length=45, nullable=true)
     */
    private $grejanje;

    /**
     * @var int|null
     *
     * @ORM\Column(name="mesecni_troskovi", type="integer", nullable=true)
     */
    private $mesecniTroskovi;

    /**
     * @var string|null
     *
     * @ORM\Column(name="opis", type="string", length=50, nullable=true)
     */
    private $opis;

    /**
     * @var string|null
     *
     * @ORM\Column(name="naziv", type="string", length=45, nullable=false)
     */
    private $naziv;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cena", type="integer", length=11, nullable=false)
     */
    private $cena;

    /**
     * @var string|null
     *
     * @ORM\Column(name="status", type="string", length=45, nullable=true)
     */
    private $status;

    /**
     * @var \App\Models\Entities\Mikrolokacija
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Mikrolokacija")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mikrolokacija", referencedColumnName="idmikro")
     * })
     */
    private $mikrolokacija;

    /**
     * @var \App\Models\Entities\Opstina
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Opstina")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="opstina", referencedColumnName="idOpstine")
     * })
     */
    private $opstina;

    /**
     * @var \App\Models\Entities\Agencija
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Agencija")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="agencija", referencedColumnName="idA")
     * })
     */
    private $agencija;

    /**
     * @var \App\Models\Entities\Ulica
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Ulica")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ulica", referencedColumnName="idU")
     * })
     */
    private $ulica;

    /**
     * @var \App\Models\Entities\Karakteristike
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Karakteristike")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="karakteristike", referencedColumnName="idkarakteristike")
     * })
     */
    private $karakteristike;

    /**
     * @var \App\Models\Entities\Korisnik
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Korisnik")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="oglasivac", referencedColumnName="idK")
     * })
     */
    private $oglasivac;

    /**
     * @var \App\Models\Entities\Tipnekretnine
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Tipnekretnine")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tip", referencedColumnName="idTipnekretnine")
     * })
     */
    private $tip;

    /**
     * @var \App\Models\Entities\Grad
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Grad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="gradID", referencedColumnName="idG")
     * })
     */
    private $gradid;


    /**
     *
     * @var \App\Models\Entities\Korisnik[]
     *
     * Many Nekretnina(omiljena) have Many Korisnici(kupci).
     * @ORM\ManyToMany(targetEntity="App\Models\Entities\Korisnik", mappedBy="omiljene")
     */
    private $kupci;

    public function __construct()
    {
        $this->kupci = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return int
     */
    public function getIdn()
    {
        return $this->idn;
    }

    /**
     * @param int $idn
     */
    public function setIdn($idn)
    {
        $this->idn = $idn;
    }

    /**
     * @return int|null
     */
    public function getKvadratura()
    {
        return $this->kvadratura;
    }

    /**
     * @param int|null $kvadratura
     */
    public function setKvadratura($kvadratura)
    {
        $this->kvadratura = $kvadratura;
    }

    /**
     * @return int|null
     */
    public function getBrSoba()
    {
        return $this->brSoba;
    }

    /**
     * @param int|null $brSoba
     */
    public function setBrSoba($brSoba)
    {
        $this->brSoba = $brSoba;
    }

    /**
     * @return int|null
     */
    public function getCena()
    {
        return $this->cena;
    }

    /**
     * @param int|null $cena
     */
    public function setCena($cena)
    {
        $this->cena = $cena;
    }
    /**
     * @return \DateTime|null
     */
    public function getGodinaIzgradnje()
    {
        return $this->godinaIzgradnje;
    }

    /**
     * @param \DateTime|null $godinaIzgradnje
     */
    public function setGodinaIzgradnje($godinaIzgradnje)
    {
        $this->godinaIzgradnje = $godinaIzgradnje;
    }

    /**
     * @return int|null
     */
    public function getSprat()
    {
        return $this->sprat;
    }

    /**
     * @param int|null $sprat
     */
    public function setSprat($sprat)
    {
        $this->sprat = $sprat;
    }

    /**
     * @return int|null
     */
    public function getUkupnaSpratnost()
    {
        return $this->ukupnaSpratnost;
    }

    /**
     * @param int|null $ukupnaSpratnost
     */
    public function setUkupnaSpratnost($ukupnaSpratnost)
    {
        $this->ukupnaSpratnost = $ukupnaSpratnost;
    }

    /**
     * @return string|null
     */
    public function getParking()
    {
        return $this->parking;
    }

    /**
     * @param string|null $parking
     */
    public function setParking($parking)
    {
        $this->parking = $parking;
    }

    /**
     * @return string|null
     */
    public function getStanje()
    {
        return $this->stanje;
    }

    /**
     * @param string|null $stanje
     */
    public function setStanje($stanje)
    {
        $this->stanje = $stanje;
    }

    /**
     * @return string|null
     */
    public function getGrejanje()
    {
        return $this->grejanje;
    }

    /**
     * @param string|null $grejanje
     */
    public function setGrejanje($grejanje)
    {
        $this->grejanje = $grejanje;
    }

    /**
     * @return int|null
     */
    public function getMesecniTroskovi()
    {
        return $this->mesecniTroskovi;
    }

    /**
     * @param int|null $mesecniTroskovi
     */
    public function setMesecniTroskovi($mesecniTroskovi)
    {
        $this->mesecniTroskovi = $mesecniTroskovi;
    }

    /**
     * @return string|null
     */
    public function getOpis()
    {
        return $this->opis;
    }

    /**
     * @param string|null $opis
     */
    public function setOpis($opis)
    {
        $this->opis = $opis;
    }

    /**
     * @return string
     */
    public function getNaziv()
    {
        return $this->naziv;
    }

    /**
     * @param string $naziv
     */
    public function setNaziv($naziv)
    {
        $this->naziv = $naziv;
    }

    /**
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return Mikrolokacija
     */
    public function getMikrolokacija()
    {
        return $this->mikrolokacija;
    }

    /**
     * @param Mikrolokacija $mikrolokacija
     */
    public function setMikrolokacija($mikrolokacija)
    {
        $this->mikrolokacija = $mikrolokacija;
    }

    /**
     * @return Opstina
     */
    public function getOpstina()
    {
        return $this->opstina;
    }

    /**
     * @param Opstina $opstina
     */
    public function setOpstina($opstina)
    {
        $this->opstina = $opstina;
    }

    /**
     * @return Agencija
     */
    public function getAgencija()
    {
        return $this->agencija;
    }

    /**
     * @param Agencija $agencija
     */
    public function setAgencija($agencija)
    {
        $this->agencija = $agencija;
    }

    /**
     * @return Ulica
     */
    public function getUlica()
    {
        return $this->ulica;
    }

    /**
     * @param Ulica $ulica
     */
    public function setUlica($ulica)
    {
        $this->ulica = $ulica;
    }

    /**
     * @return Karakteristike
     */
    public function getKarakteristike()
    {
        return $this->karakteristike;
    }

    /**
     * @param Karakteristike $karakteristike
     */
    public function setKarakteristike($karakteristike)
    {
        $this->karakteristike = $karakteristike;
    }

    /**
     * @return Korisnik
     */
    public function getOglasivac()
    {
        return $this->oglasivac;
    }

    /**
     * @param Korisnik $oglasivac
     */
    public function setOglasivac($oglasivac)
    {
        $this->oglasivac = $oglasivac;
    }

    /**
     * @return Tipnekretnine
     */
    public function getTip()
    {
        return $this->tip;
    }

    /**
     * @param Tipnekretnine $tip
     */
    public function setTip($tip)
    {
        $this->tip = $tip;
    }

    /**
     * @return Grad
     */
    public function getGradid()
    {
        return $this->gradid;
    }

    /**
     * @param Grad $gradid
     */
    public function setGradid($gradid)
    {
        $this->gradid = $gradid;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getKupci()
    {
        return $this->kupci;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $kupci
     */
    public function setKupci($kupci)
    {
        $this->kupci = $kupci;
    }

    public function addKupci(Korisnik $kupac = null)
    {
        $this->kupci->add($kupac);
    }

    /**
     * brise nekretninu iz omiljenih
     */
    public function removeKupci(Korisnik $kupac)
    {
        $this->kupci->removeElement($kupac) ;
    }

}
