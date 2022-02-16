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
     * @ORM\Column(name="francbalkon", type="string", length=3, nullable=true)
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
     * @ORM\Column(name="sabastom", type="string", length=3, nullable=true)
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
     * @ORM\Column(name="interfon", type="string", length=3, nullable=true)
     */
    private $interfon;

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

    /**
     * @return int
     */
    public function getIdkarakteristike()
    {
        return $this->idkarakteristike;
    }

    /**
     * @param int $idkarakteristike
     */
    public function setIdkarakteristike($idkarakteristike)
    {
        $this->idkarakteristike = $idkarakteristike;
    }

    /**
     * @return string|null
     */
    public function getTerasa()
    {
        return $this->terasa;
    }

    /**
     * @param string|null $terasa
     */
    public function setTerasa($terasa)
    {
        $this->terasa = $terasa;
    }

    /**
     * @return string|null
     */
    public function getLodja()
    {
        return $this->lodja;
    }

    /**
     * @param string|null $lodja
     */
    public function setLodja($lodja)
    {
        $this->lodja = $lodja;
    }

    /**
     * @return string|null
     */
    public function getLift()
    {
        return $this->lift;
    }

    /**
     * @param string|null $lift
     */
    public function setLift($lift)
    {
        $this->lift = $lift;
    }

    /**
     * @return string|null
     */
    public function getFrancBalkon()
    {
        return $this->franc_balkon;
    }

    /**
     * @param string|null $franc_balkon
     */
    public function setFrancBalkon($franc_balkon)
    {
        $this->franc_balkon = $franc_balkon;
    }

    /**
     * @return string|null
     */
    public function getPodrum()
    {
        return $this->podrum;
    }

    /**
     * @param string|null $podrum
     */
    public function setPodrum($podrum)
    {
        $this->podrum = $podrum;
    }

    /**
     * @return string|null
     */
    public function getGaraza()
    {
        return $this->garaza;
    }

    /**
     * @param string|null $garaza
     */
    public function setGaraza($garaza)
    {
        $this->garaza = $garaza;
    }

    /**
     * @return string|null
     */
    public function getSaBastom()
    {
        return $this->saBastom;
    }

    /**
     * @param string|null $saBastom
     */
    public function setSaBastom($saBastom)
    {
        $this->saBastom = $saBastom;
    }

    /**
     * @return string|null
     */
    public function getKlima()
    {
        return $this->klima;
    }

    /**
     * @param string|null $klima
     */
    public function setKlima($klima)
    {
        $this->klima = $klima;
    }

    /**
     * @return string|null
     */
    public function getInternet()
    {
        return $this->internet;
    }

    /**
     * @param string|null $internet
     */
    public function setInternet($internet)
    {
        $this->internet = $internet;
    }

    /**
     * @return string|null
     */
    public function getInterfon()
    {
        return $this->interfon;
    }

    /**
     * @param string|null $interfon
     */
    public function setInterfon($interfon)
    {
        $this->interfon = $interfon;
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
     * @return string|null
     */
    public function getParking()
    {
        return $this->parking;
    }

    /**
     * @param string|null $parking
     */
    public function setParking($parking)
    {
        $this->parking = $parking;
    }


}
