<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nekretnina
 *
 * @ORM\Table(name="nekretnina", uniqueConstraints={@ORM\UniqueConstraint(name="tip_UNIQUE", columns={"tip"}), @ORM\UniqueConstraint(name="grad_UNIQUE", columns={"gradID"}), @ORM\UniqueConstraint(name="mikrolokacija_UNIQUE", columns={"mikrolokacija"}), @ORM\UniqueConstraint(name="oglasivac_UNIQUE", columns={"oglasivac"}), @ORM\UniqueConstraint(name="agencija_UNIQUE", columns={"agencija"}), @ORM\UniqueConstraint(name="opstina_UNIQUE", columns={"opstina"}), @ORM\UniqueConstraint(name="ulica_UNIQUE", columns={"ulica"}), @ORM\UniqueConstraint(name="karakteristike_UNIQUE", columns={"karakteristike"}), @ORM\UniqueConstraint(name="idN_UNIQUE", columns={"idN"})})
 * @ORM\Entity
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
     * @ORM\Column(name="godina_izgradnje", type="date", nullable=true)
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


}
