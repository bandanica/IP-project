<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Karakteristike
 *
 * @ORM\Table(name="karakteristike", uniqueConstraints={@ORM\UniqueConstraint(name="idkarakteristike_UNIQUE", columns={"idkarakteristike"})})
 * @ORM\Entity
 */
class Karakteristike
{
    /**
     * @var int
     *
     * @ORM\Column(name="idkarakteristike", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idkarakteristike;

    /**
     * @var string|null
     *
     * @ORM\Column(name="terasa", type="string", length=3, nullable=true)
     */
    private $terasa;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lodja", type="string", length=3, nullable=true)
     */
    private $lodja;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lift", type="string", length=3, nullable=true)
     */
    private $lift;

    /**
     * @var string|null
     *
     * @ORM\Column(name="franc.balkon", type="string", length=3, nullable=true)
     */
    private $franc_balkon;

    /**
     * @var string|null
     *
     * @ORM\Column(name="podrum", type="string", length=3, nullable=true)
     */
    private $podrum;

    /**
     * @var string|null
     *
     * @ORM\Column(name="garaza", type="string", length=3, nullable=true)
     */
    private $garaza;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sa bastom", type="string", length=3, nullable=true)
     */
    private $saBastom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="klima", type="string", length=3, nullable=true)
     */
    private $klima;

    /**
     * @var string|null
     *
     * @ORM\Column(name="internet", type="string", length=3, nullable=true)
     */
    private $internet;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telefon", type="string", length=3, nullable=true)
     */
    private $telefon;

    /**
     * @var string|null
     *
     * @ORM\Column(name="parking", type="string", length=3, nullable=true)
     */
    private $parking;


}
