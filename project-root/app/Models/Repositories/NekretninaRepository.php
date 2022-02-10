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
    public function findLatest($s)
    {
        return $this->findBy(['status'=>$s], ['idn' => 'ASC']);
    }

    /*
     * funkcija koja vraca rezultate pretrage kupca
     */

    public function traziNekretnineGrad($cena, $kvadr, $sobe,$gradic, $tip)
    {
        $status= "'Aktivno'";
        $upit = $this->getEntityManager()->createQueryBuilder();

        $upit->select('n')
            ->from('App\Models\Entities\Nekretnina', 'n')
            ->innerJoin('App\Models\Entities\Tipnekretnine', 't', 'WITH', 't.idtipnekretnine = n.tip')
            ->innerJoin("App\Models\Entities\Grad",'g','WITH','g.idg= n.gradid')
            ->where($upit->expr()->andX(
                $upit->expr()->eq('n.tip', "$tip"),
                $upit->expr()->eq('n.status', $status),
                $upit->expr()->lte('n.cena', "$cena"),
                $upit->expr()->gte('n.kvadratura', "$kvadr"),
                $upit->expr()->gte('n.brSoba', "$sobe"),
                $upit->expr()->eq('n.gradid', "$gradic")));
        //return  $upit->getQuery()->getDQL();
        return $upit->getQuery()->getResult();
    }
    public function traziNekretnineOpstina($cena, $kvadr, $sobe, $opstina, $tip)
    {
        $status= 'Aktivno';
        $upit = $this->getEntityManager()->createQueryBuilder();

        $upit->select('n')
            ->from('App\Models\Entities\Nekretnina', 'n')
            ->join('App\Models\Entities\Tipnekretnine', 't', 'WITH', 't.idtipnekretnine = n.tip')
            ->innerJoin("App\Models\Entities\Opstina",'o','WITH','o.idopstine= n.opstina')
            ->where($upit->expr()->andX(
                $upit->expr()->eq('n.tip', "$tip"),
                $upit->expr()->eq('n.status', "$status"),
                $upit->expr()->lte('n.cena', "$cena"),
                $upit->expr()->gte('n.kvadratura', "$kvadr"),
                $upit->expr()->gte('n.brSoba', "$sobe"),
                $upit->expr()->eq('n.opstina', "$opstina")
            ));

        return $upit->getQuery()->getResult();
    }
    public function traziNekretnineLokacija($cena, $kvadr, $sobe, $lokacija, $tip)
    {
        $status= 'Aktivno';
        $upit = $this->getEntityManager()->createQueryBuilder();

        $upit->select('n')
            ->from('App\Models\Entities\Nekretnina', 'n')
            ->join('App\Models\Entities\Tipnekretnine', 't', 'WITH', 't.idtipnekretnine = n.tip')
            ->innerJoin("App\Models\Entities\Mikrolokacija",'m','WITH','m.idmikro= n.mikrolokacija')
            ->where($upit->expr()->andX(
                $upit->expr()->eq('n.tip', "$tip"),
                $upit->expr()->lte('n.cena', "$cena"),
                $upit->expr()->eq('n.status', "$status"),
                $upit->expr()->gte('n.kvadratura', "$kvadr"),
                $upit->expr()->gte('n.brSoba', "$sobe"),
                $upit->expr()->eq('n.mikrolokacija', "$lokacija")
            ));

        return $upit->getQuery()->getResult();
    }

}