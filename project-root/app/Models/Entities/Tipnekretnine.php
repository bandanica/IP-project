<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipnekretnine
 *
 * @ORM\Table(name="tipnekretnine", uniqueConstraints={@ORM\UniqueConstraint(name="idTipnekretnine_UNIQUE", columns={"idTipnekretnine"})})
 * @ORM\Entity
 */
class Tipnekretnine
{
    /**
     * @var int
     *
     * @ORM\Column(name="idTipnekretnine", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtipnekretnine;

    /**
     * @var string|null
     *
     * @ORM\Column(name="naziv_tipa", type="string", length=45, nullable=true)
     */
    private $nazivTipa;


}
