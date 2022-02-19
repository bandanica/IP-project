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

    /**
     * @var string|null
     *
     * @ORM\Column(name="gradski_prevoz", type="string", length=100, nullable=true)
     */
    private $gradskiPrevoz;


    /**
     * @return int
     */
    public function getIdg()
    {
        return $this->idg;
    }

    /**
     * @param int $idg
     */
    public function setIdg($idg)
    {
        $this->idg = $idg;
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
    public function getGradskiPrevoz()
    {
        return $this->gradskiPrevoz;
    }

    /**
     * @param string|null $gradskiPrevoz
     */
    public function setGradskiPrevoz($gradskiPrevoz)
    {
        $this->gradskiPrevoz = $gradskiPrevoz;
    }

}
