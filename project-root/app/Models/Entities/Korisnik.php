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
    private $idk;

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
     */
    private $idagencije;


}
