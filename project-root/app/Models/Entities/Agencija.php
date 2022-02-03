<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agencija
 *
 * @ORM\Table(name="agencija", uniqueConstraints={@ORM\UniqueConstraint(name="PIB_UNIQUE", columns={"PIB"}), @ORM\UniqueConstraint(name="idA_UNIQUE", columns={"idA"}), @ORM\UniqueConstraint(name="idGrada_UNIQUE", columns={"idGrada"})})
 * @ORM\Entity
 */
class Agencija
{
    /**
     * @var int
     *
     * @ORM\Column(name="idA", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ida;

    /**
     * @var string|null
     *
     * @ORM\Column(name="naziv", type="string", length=45, nullable=true)
     */
    private $naziv;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adresa", type="string", length=45, nullable=true)
     */
    private $adresa;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telefon", type="string", length=45, nullable=true)
     */
    private $telefon;

    /**
     * @var string
     *
     * @ORM\Column(name="PIB", type="string", length=45, nullable=false)
     */
    private $pib;

    /**
     * @var \App\Models\Entities\Grad
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Grad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idGrada", referencedColumnName="idG")
     * })
     */
    private $idgrada;


}
