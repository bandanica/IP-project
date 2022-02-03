<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grad
 *
 * @ORM\Table(name="grad", uniqueConstraints={@ORM\UniqueConstraint(name="idG_UNIQUE", columns={"idG"})})
 * @ORM\Entity
 */
class Grad
{
    /**
     * @var int
     *
     * @ORM\Column(name="idG", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idg;

    /**
     * @var string|null
     *
     * @ORM\Column(name="naziv", type="string", length=45, nullable=true)
     */
    private $naziv;


}
