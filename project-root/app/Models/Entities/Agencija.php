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

    /**
     * @return int
     */
    public function getIda()
    {
        return $this->ida;
    }

    /**
     * @param int $ida
     */
    public function setIda($ida)
    {
        $this->ida = $ida;
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
     * @return string|null
     */
    public function getAdresa()
    {
        return $this->adresa;
    }

    /**
     * @param string|null $adresa
     */
    public function setAdresa($adresa)
    {
        $this->adresa = $adresa;
    }

    /**
     * @return string|null
     */
    public function getTelefon()
    {
        return $this->telefon;
    }

    /**
     * @param string|null $telefon
     */
    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;
    }

    /**
     * @return string
     */
    public function getPib()
    {
        return $this->pib;
    }

    /**
     * @param string $pib
     */
    public function setPib($pib)
    {
        $this->pib = $pib;
    }

    /**
     * @return Grad
     */
    public function getIdgrada()
    {
        return $this->idgrada;
    }

    /**
     * @param Grad $idgrada
     */
    public function setIdgrada($idgrada)
    {
        $this->idgrada = $idgrada;
    }


}
