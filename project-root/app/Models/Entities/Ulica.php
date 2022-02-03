<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ulica
 *
 * @ORM\Table(name="ulica", uniqueConstraints={@ORM\UniqueConstraint(name="mikrolokacija_UNIQUE", columns={"mikrolokacija"}), @ORM\UniqueConstraint(name="idU_UNIQUE", columns={"idU"})})
 * @ORM\Entity
 */
class Ulica
{
    /**
     * @var int
     *
     * @ORM\Column(name="idU", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idu;

    /**
     * @var string|null
     *
     * @ORM\Column(name="naziv", type="string", length=45, nullable=true)
     */
    private $naziv;

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
     * @return int
     */
    public function getIdu()
    {
        return $this->idu;
    }

    /**
     * @param int $idu
     */
    public function setIdu($idu)
    {
        $this->idu = $idu;
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
     * @return Mikrolokacija
     */
    public function getMikrolokacija()
    {
        return $this->mikrolokacija;
    }

    /**
     * @param Mikrolokacija $mikrolokacija
     */
    public function setMikrolokacija($mikrolokacija)
    {
        $this->mikrolokacija = $mikrolokacija;
    }


}
