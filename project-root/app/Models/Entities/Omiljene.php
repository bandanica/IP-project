<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omiljene
 *
 * @ORM\Table(name="omiljene", uniqueConstraints={@ORM\UniqueConstraint(name="idO_UNIQUE", columns={"idO"})}, indexes={@ORM\Index(name="idkupca_idx", columns={"idKupca"}), @ORM\Index(name="idnekretnine_idx", columns={"idNekretnine"})})
 * @ORM\Entity
 */
class Omiljene
{
    /**
     * @var int
     *
     * @ORM\Column(name="idO", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ido;

    /**
     * @var \App\Models\Entities\Korisnik
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Korisnik")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idKupca", referencedColumnName="idK")
     * })
     */
    private $idkupca;

    /**
     * @var \App\Models\Entities\Nekretnina
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Nekretnina")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idNekretnine", referencedColumnName="idN")
     * })
     */
    private $idnekretnine;


}
