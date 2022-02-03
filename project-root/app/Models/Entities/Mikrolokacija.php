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

    /**
     * @return int
     */
    public function getIdmikro()
    {
        return $this->idmikro;
    }

    /**
     * @param int $idmikro
     */
    public function setIdmikro($idmikro)
    {
        $this->idmikro = $idmikro;
    }

    /**
     * @return string|null
     */
    public function getNaziv()
    {
        return $this->naziv;
    }

    /**
     * @param string|null $naziv
     */
    public function setNaziv($naziv)
    {
        $this->naziv = $naziv;
    }

    /**
     * @return Opstina
     */
    public function getOpstina()
    {
        return $this->opstina;
    }

    /**
     * @param Opstina $opstina
     */
    public function setOpstina($opstina)
    {
        $this->opstina = $opstina;
    }


}
