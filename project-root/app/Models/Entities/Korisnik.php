<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Korisnik
 *
 * @ORM\Table(name="korisnik", uniqueConstraints={@ORM\UniqueConstraint(name="kor_ime_UNIQUE", columns={"kor_ime"}), @ORM\UniqueConstraint(name="idK_UNIQUE", columns={"idK"})}, indexes={@ORM\Index(name="gradid_idx", columns={"idGrada"}), @ORM\Index(name="tip_idx", columns={"tip"}), @ORM\Index(name="idAgencije_idx", columns={"idAgencije"})})
 * @ORM\Entity
 */
class Korisnik
{
    /**
     * @var int
     *
     * @ORM\Column(name="idK", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idK;

    /**
     * @var string
     *
     * @ORM\Column(name="kor_ime", type="string", length=45, nullable=false)
     */
    private $korIme;

    /**
     * @var string
     *
     * @ORM\Column(name="ime", type="string", length=45, nullable=false)
     */
    private $ime;

    /**
     * @var string
     *
     * @ORM\Column(name="prezime", type="string", length=45, nullable=false)
     */
    private $prezime;

    /**
     * @var string
     *
     * @ORM\Column(name="lozinka", type="string", length=45, nullable=false)
     */
    private $lozinka;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datum_rodjenja", type="datetime", nullable=true)
     */
    private $datumRodjenja;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telefon", type="string", length=45, nullable=true)
     */
    private $telefon;

    /**
     * @var string|null
     *
     * @ORM\Column(name="e_mail", type="string", length=45, nullable=true)
     */
    private $eMail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="br_licence", type="string", length=45, nullable=true)
     */
    private $brLicence;

    /**
     * @var \App\Models\Entities\Grad
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Grad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idGrada", referencedColumnName="idG")
     * })
     */
    private $idgrada;

    /**
     * @var \App\Models\Entities\Tipkorisnika
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Tipkorisnika")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tip", referencedColumnName="idT")
     * })
     */
    private $tip;

    /**
     * @var \App\Models\Entities\Agencija
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Agencija")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idAgencije", referencedColumnName="idA")
     * })
     *
     */
    private $idagencije;


    /**
     *
     * @var \App\Models\Entities\Nekretnina[]
     *
     * Many Korisnik(kupac) have Many Nekretnina(omiljena).
     * @ORM\ManyToMany(targetEntity="App\Models\Entities\Nekretnina", inversedBy="kupci")
     * @ORM\JoinTable(name="omiljene",
     *       joinColumns={@ORM\JoinColumn(name="idK", referencedColumnName="idKupca")},
     *       inverseJoinColumns={@ORM\JoinColumn(name="idn", referencedColumnName="idNekretnine")}
     *      )
     */
    private $omiljene;

    /**
     * @var int
     *
     * @ORM\Column(name="odobren", type="integer", options={"default" : 0})
     */
    private $status;

    public function __construct()
    {
        $this->omiljene = new \Doctrine\Common\Collections\ArrayCollection();
        $this->status = 0;
    }

    /**
     * @return int
     */
    public function getIdK()
    {
        return $this->idK;
    }

    /**
     * @param int $idk
     */
    public function setIdK($idk)
    {
        $this->idK = $idk;
    }

    /**
     * @return string
     */
    public function getKorIme()
    {
        return $this->korIme;
    }

    /**
     * @param string $korIme
     */
    public function setKorIme($korIme)
    {
        $this->korIme = $korIme;
    }

    /**
     * @return string
     */
    public function getIme()
    {
        return $this->ime;
    }

    /**
     * @param string $ime
     */
    public function setIme($ime)
    {
        $this->ime = $ime;
    }

    /**
     * @return string
     */
    public function getPrezime()
    {
        return $this->prezime;
    }

    /**
     * @param string $prezime
     */
    public function setPrezime($prezime)
    {
        $this->prezime = $prezime;
    }

    /**
     * @return string
     */
    public function getLozinka()
    {
        return $this->lozinka;
    }

    /**
     * @param string $lozinka
     */
    public function setLozinka($lozinka)
    {
        $this->lozinka = $lozinka;
    }

    /**
     * @return \DateTime|null
     */
    public function getDatumRodjenja()
    {
        return $this->datumRodjenja;
    }

    /**
     * @param \DateTime|null $datumRodjenja
     */
    public function setDatumRodjenja($datumRodjenja)
    {
        $this->datumRodjenja = $datumRodjenja;
    }

    /**
     * @return string|null
     */
    public function getTelefon()
    {
        return $this->telefon;
    }

    /**
     * @param string|null $telefon
     */
    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;
    }

    /**
     * @return string|null
     */
    public function getEMail()
    {
        return $this->eMail;
    }

    /**
     * @param string|null $eMail
     */
    public function setEMail($eMail)
    {
        $this->eMail = $eMail;
    }

    /**
     * @return string|null
     */
    public function getBrLicence()
    {
        return $this->brLicence;
    }

    /**
     * @param string|null $brLicence
     */
    public function setBrLicence($brLicence)
    {
        $this->brLicence = $brLicence;
    }

    /**
     * @return Grad
     */
    public function getIdgrada()
    {
        return $this->idgrada;
    }

    /**
     * @param Grad $idgrada
     */
    public function setIdgrada($idgrada)
    {
        $this->idgrada = $idgrada;
    }

    /**
     * @return Tipkorisnika
     */
    public function getTip()
    {
        return $this->tip;
    }

    /**
     * @param Tipkorisnika $tip
     */
    public function setTip($tip)
    {
        $this->tip = $tip;
    }

    /**
     * @return Agencija
     */
    public function getIdagencije()
    {
        return $this->idagencije;
    }

    /**
     * @param Agencija $idagencije
     */
    public function setIdagencije($idagencije)
    {
        $this->idagencije = $idagencije;
    }

    /**
     * @return Nekretnina[]
     */
    public function getOmiljene()
    {
        return $this->omiljene;
    }

    /**
     * @param Nekretnina[] $omiljene
     */
    public function setOmiljene($omiljene)
    {
        $this->omiljene = $omiljene;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }


}
