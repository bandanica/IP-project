<?php

namespace App\Models\Repositories;

use Doctrine\ORM\EntityRepository;


/*
 * Ova klasa se koristi kao repozitorijum klasa za entitet Nekretnina
 */

class NekretninaRepository extends EntityRepository
{
    /*
     * funkcija koja vraca Nekretnine pocevsi od poslednje dodate
     * nekretnine, sortirane
     *
     * @return Nekretnine[]
     */
    public function findLatest()
    {
        return $this->findBy(array(), array('idn' => 'ASC'));
    }

    /*
     * funkcija koja vraca rezultate pretrage kupca
     */

    public function traziNekretnine($cena, $kvadr, $sobe, $tip)
    {
        $upit = $this->getEntityManager()->createQueryBuilder();

        $upit->select('n')
            ->from('App\Models\Entities\Nekretnina', 'n')
            ->join('App\Models\Entities\Tipnekretnine', 't', 'WITH', 't.idtipnekretnine = n.tip')
            ->where($upit->expr()->andX(
                $upit->expr()->eq('n.tip', "$tip"),
                $upit->expr()->lte('n.cena', "$cena"),
                $upit->expr()->gte('n.kvadratura', "$kvadr"),
                $upit->expr()->gte('n.brSoba', "$sobe")));

        return $upit->getQuery()->getResult();
    }

}