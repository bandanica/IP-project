<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipkorisnika
 *
 * @ORM\Table(name="tipkorisnika", uniqueConstraints={@ORM\UniqueConstraint(name="idT_UNIQUE", columns={"idT"})})
 * @ORM\Entity
 */
class Tipkorisnika
{
    /**
     * @var int
     *
     * @ORM\Column(name="idT", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tip_korisnika", type="string", length=45, nullable=true)
     */
    private $tipKorisnika;


}
