<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Opstina
 *
 * @ORM\Table(name="opstina", uniqueConstraints={@ORM\UniqueConstraint(name="grad_UNIQUE", columns={"grad"}), @ORM\UniqueConstraint(name="idOpstine_UNIQUE", columns={"idOpstine"})})
 * @ORM\Entity
 */
class Opstina
{
    /**
     * @var int
     *
     * @ORM\Column(name="idOpstine", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idopstine;

    /**
     * @var string|null
     *
     * @ORM\Column(name="naziv", type="string", length=45, nullable=true)
     */
    private $naziv;

    /**
     * @var \App\Models\Entities\Grad
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Grad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grad", referencedColumnName="idG")
     * })
     */
    private $grad;

    /**
     * @return int
     */
    public function getIdopstine()
    {
        return $this->idopstine;
    }

    /**
     * @param int $idopstine
     */
    public function setIdopstine($idopstine)
    {
        $this->idopstine = $idopstine;
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
     * @return Grad
     */
    public function getGrad()
    {
        return $this->grad;
    }

    /**
     * @param Grad $grad
     */
    public function setGrad($grad)
    {
        $this->grad = $grad;
    }


}
