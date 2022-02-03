<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mikrolokacija
 *
 * @ORM\Table(name="mikrolokacija", uniqueConstraints={@ORM\UniqueConstraint(name="opstina_UNIQUE", columns={"opstina"}), @ORM\UniqueConstraint(name="idmikro_UNIQUE", columns={"idmikro"})})
 * @ORM\Entity
 */
class Mikrolokacija
{
    /**
     * @var int
     *
     * @ORM\Column(name="idmikro", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmikro;

    /**
     * @var string|null
     *
     * @ORM\Column(name="naziv", type="string", length=45, nullable=true)
     */
    private $naziv;

    /**
     * @var \App\Models\Entities\Opstina
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Opstina")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="opstina", referencedColumnName="idOpstine")
     * })
     */
    private $opstina;


}
