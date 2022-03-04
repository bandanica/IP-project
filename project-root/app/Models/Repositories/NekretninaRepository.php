<?php

namespace App\Models\Repositories;

use App\Models\Entities\Nekretnina;
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
        return $this->findBy(['status' => $s], ['idn' => 'DESC']);
    }

    /*
     * funkcija koja vraca rezultate pretrage kupca ako je uneta lokacija grad
     *
     * @param int $cena, int $kvadr, int $sobe, Grad $gradic, Tip $tip
     *
     * @return Nekretnina[]
     */

    public function traziNekretnineGrad($cena, $kvadr, $sobe, $gradic, $tip)
    {
        $status = "'Aktivno'";
        $upit = $this->getEntityManager()->createQueryBuilder();

        $upit->select('n')
            ->from('App\Models\Entities\Nekretnina', 'n')
            ->innerJoin('App\Models\Entities\Tipnekretnine', 't', 'WITH', 't.idtipnekretnine = n.tip')
            ->innerJoin("App\Models\Entities\Grad", 'g', 'WITH', 'g.idg= n.gradid')
            ->where($upit->expr()->andX(
                $upit->expr()->eq('n.tip', "$tip"),
                $upit->expr()->eq('n.status', $status),
                $upit->expr()->lte('n.cena', "$cena"),
                $upit->expr()->gte('n.kvadratura', "$kvadr"),
                $upit->expr()->gte('n.brSoba', "$sobe"),
                $upit->expr()->eq('n.gradid', "$gradic")))
            ->orderBy('n.idn', 'desc');
        //return  $upit->getQuery()->getDQL();
        return $upit->getQuery()->getResult();
    }


    /*
     * funkcija koja vraca rezultate pretrage kupca ako je uneta lokacija opstina
     *
     * @param int $cena, int $kvadr, int $sobe, Opstina $opstina, Tip $tip
     *
     * @return Nekretnina[]
     */

    public function traziNekretnineOpstina($cena, $kvadr, $sobe, $opstina, $tip)
    {
        $status = "'Aktivno'";
        $upit = $this->getEntityManager()->createQueryBuilder();

        $upit->select('n')
            ->from('App\Models\Entities\Nekretnina', 'n')
            ->join('App\Models\Entities\Tipnekretnine', 't', 'WITH', 't.idtipnekretnine = n.tip')
            ->innerJoin("App\Models\Entities\Opstina", 'o', 'WITH', 'o.idopstine= n.opstina')
            ->where($upit->expr()->andX(
                $upit->expr()->eq('n.tip', "$tip"),
                $upit->expr()->eq('n.status', $status),
                $upit->expr()->lte('n.cena', "$cena"),
                $upit->expr()->gte('n.kvadratura', "$kvadr"),
                $upit->expr()->gte('n.brSoba', "$sobe"),
                $upit->expr()->eq('n.opstina', "$opstina")
            ));

        return $upit->getQuery()->getResult();
    }


    /*
     * funkcija koja vraca rezultate pretrage kupca ako je uneta lokacija mikrolokacija
     *
     * @param int $cena, int $kvadr, int $sobe, Mikrolokacija $lokacija, Tip $tip
     *
     * @return Nekretnina[]
     */
    public function traziNekretnineLokacija($cena, $kvadr, $sobe, $lokacija, $tip)
    {
        $status = "'Aktivno'";
        $upit = $this->getEntityManager()->createQueryBuilder();

        $upit->select('n')
            ->from('App\Models\Entities\Nekretnina', 'n')
            ->join('App\Models\Entities\Tipnekretnine', 't', 'WITH', 't.idtipnekretnine = n.tip')
            ->innerJoin("App\Models\Entities\Mikrolokacija", 'm', 'WITH', 'm.idmikro= n.mikrolokacija')
            ->where($upit->expr()->andX(
                $upit->expr()->eq('n.tip', "$tip"),
                $upit->expr()->lte('n.cena', "$cena"),
                $upit->expr()->eq('n.status', $status),
                $upit->expr()->gte('n.kvadratura', "$kvadr"),
                $upit->expr()->gte('n.brSoba', "$sobe"),
                $upit->expr()->eq('n.mikrolokacija', "$lokacija")
            ));

        return $upit->getQuery()->getResult();
    }


    /*
     * funkcija koja vraca rezultate pretrage kupca ako nije uneta lokacija
     *
     * @param int $cena, int $kvadr, int $sobe, Tip $tip
     *
     * @return Nekretnina[]
     */
    public function traziNekretnineBezLokacije($cena, $kvadr, $sobe, $tip){
        $status = "'Aktivno'";
        $upit = $this->getEntityManager()->createQueryBuilder();

        $upit->select('n')
            ->from('App\Models\Entities\Nekretnina', 'n')
            ->join('App\Models\Entities\Tipnekretnine', 't', 'WITH', 't.idtipnekretnine = n.tip')
            ->where($upit->expr()->andX(
                $upit->expr()->eq('n.tip', "$tip"),
                $upit->expr()->lte('n.cena', "$cena"),
                $upit->expr()->eq('n.status', $status),
                $upit->expr()->gte('n.kvadratura', "$kvadr"),
                $upit->expr()->gte('n.brSoba', "$sobe"),
            ));

        return $upit->getQuery()->getResult();
    }


    /*
     * funkcija koja vraca rezultate napredne pretrage kupca ako je uneta lokacija grad
     *
     * @param int $minc, int $maxc, int $mink, int $maxk, int $mins, int $maxs, int $minSprat, int $maxSprat, Grad $gradic, Tip $tip, string $ming, string $maxg, string $stanje
     *
     * @return Nekretnina[]
     */
    public function naprednaGradovi($minc, $maxc, $mink, $maxk, $mins, $maxs, $minSprat, $maxSprat, $gradic, $tip, $ming, $maxg, $stanje)
    {
        if ($stanje==""){
            $status = "'Aktivno'";
            $ming = date_create_from_format("Y-m-d H:i", $ming . '00:00');
            $maxg = date_create_from_format("Y-m-d H:i", $maxg . '00:00');
            $upit = $this->getEntityManager()->createQueryBuilder();


            $upit->select('n')
                ->from('App\Models\Entities\Nekretnina', 'n')
                ->innerJoin('App\Models\Entities\Tipnekretnine', 't', 'WITH', 't.idtipnekretnine = n.tip')
                ->innerJoin("App\Models\Entities\Grad", 'g', 'WITH', 'g.idg= n.gradid')
                ->where($upit->expr()->andX(
                    $upit->expr()->eq('n.tip', "$tip"),
                    $upit->expr()->eq('n.status', $status),
                    $upit->expr()->lte('n.cena', "$maxc"),
                    $upit->expr()->gte('n.cena', "$minc"),
                    $upit->expr()->gte('n.kvadratura', "$mink"),
                    $upit->expr()->lte('n.kvadratura', "$maxk"),
                    $upit->expr()->gte('n.brSoba', "$mins"),
                    $upit->expr()->lte('n.brSoba', "$maxs"),
                    $upit->expr()->between('n.godinaIzgradnje', '?1', '?2'),
                    $upit->expr()->gte('n.ukupnaSpratnost', "$minSprat"),
                    $upit->expr()->lte('n.ukupnaSpratnost', "$maxSprat"),
                    $upit->expr()->eq('n.gradid', "$gradic")))
                ->setParameters(['1' => $ming, '2' => $maxg]);
        }
        else{
            $status = "'Aktivno'";
            $ming = date_create_from_format("Y-m-d H:i", $ming . '00:00');
            $maxg = date_create_from_format("Y-m-d H:i", $maxg . '00:00');
            $upit = $this->getEntityManager()->createQueryBuilder();


            $upit->select('n')
                ->from('App\Models\Entities\Nekretnina', 'n')
                ->innerJoin('App\Models\Entities\Tipnekretnine', 't', 'WITH', 't.idtipnekretnine = n.tip')
                ->innerJoin("App\Models\Entities\Grad", 'g', 'WITH', 'g.idg= n.gradid')
                ->where($upit->expr()->andX(
                    $upit->expr()->eq('n.tip', "$tip"),
                    $upit->expr()->eq('n.status', $status),
                    $upit->expr()->eq('n.stanje',$stanje),
                    $upit->expr()->lte('n.cena', "$maxc"),
                    $upit->expr()->gte('n.cena', "$minc"),
                    $upit->expr()->gte('n.kvadratura', "$mink"),
                    $upit->expr()->lte('n.kvadratura', "$maxk"),
                    $upit->expr()->gte('n.brSoba', "$mins"),
                    $upit->expr()->lte('n.brSoba', "$maxs"),
                    $upit->expr()->between('n.godinaIzgradnje', '?1', '?2'),
                    $upit->expr()->gte('n.ukupnaSpratnost', "$minSprat"),
                    $upit->expr()->lte('n.ukupnaSpratnost', "$maxSprat"),
                    $upit->expr()->eq('n.gradid', "$gradic")))
                ->setParameters(['1' => $ming, '2' => $maxg]);

        }

        //return  $upit->getQuery()->getDQL();
        return $upit->getQuery()->getResult();
    }

    /*
     * funkcija koja vraca rezultate napredne pretrage kupca ako je uneta lokacija opstina
     *
     * @param int $minc, int $maxc, int $mink, int $maxk, int $mins, int $maxs, int $minSprat, int $maxSprat, Opstina $opstina, Tip $tip, string $ming, string $maxg, string $stanje
     *
     * @return Nekretnina[]
     */
    public function naprednaOpstine($minc, $maxc, $mink, $maxk, $mins, $maxs, $minSprat, $maxSprat, $opstina, $tip, $ming, $maxg, $stanje)
    {
        if ($stanje==""){
            $status = "'Aktivno'";
            $ming = date_create_from_format("Y-m-d", $ming);
            $maxg = date_create_from_format("Y-m-d", $maxg);
            $upit = $this->getEntityManager()->createQueryBuilder();


            $upit->select('n')
                ->from('App\Models\Entities\Nekretnina', 'n')
                ->innerJoin('App\Models\Entities\Tipnekretnine', 't', 'WITH', 't.idtipnekretnine = n.tip')
                ->innerJoin("App\Models\Entities\Opstina", 'o', 'WITH', 'o.idopstine= n.opstina')
                ->where($upit->expr()->andX(
                    $upit->expr()->eq('n.tip', "$tip"),
                    $upit->expr()->eq('n.status', $status),
                    $upit->expr()->lte('n.cena', "$maxc"),
                    $upit->expr()->gte('n.cena', "$minc"),
                    $upit->expr()->gte('n.kvadratura', "$mink"),
                    $upit->expr()->lte('n.kvadratura', "$maxk"),
                    $upit->expr()->gte('n.brSoba', "$mins"),
                    $upit->expr()->lte('n.brSoba', "$maxs"),
                    $upit->expr()->between('n.godinaIzgradnje', '?1', '?2'),
                    $upit->expr()->gte('n.ukupnaSpratnost', "$minSprat"),
                    $upit->expr()->lte('n.ukupnaSpratnost', "$maxSprat"),
                    $upit->expr()->eq('n.opstina', "$opstina")))
                ->setParameters(['1' => $ming, '2' => $maxg]);
        }
        else{


        $status = "'Aktivno'";
        $ming = date_create_from_format("Y-m-d", $ming);
        $maxg = date_create_from_format("Y-m-d", $maxg);
        $upit = $this->getEntityManager()->createQueryBuilder();


        $upit->select('n')
            ->from('App\Models\Entities\Nekretnina', 'n')
            ->innerJoin('App\Models\Entities\Tipnekretnine', 't', 'WITH', 't.idtipnekretnine = n.tip')
            ->innerJoin("App\Models\Entities\Opstina", 'o', 'WITH', 'o.idopstine= n.opstina')
            ->where($upit->expr()->andX(
                $upit->expr()->eq('n.tip', "$tip"),
                $upit->expr()->eq('n.status', $status),
                $upit->expr()->eq('n.stanje',$stanje),
                $upit->expr()->lte('n.cena', "$maxc"),
                $upit->expr()->gte('n.cena', "$minc"),
                $upit->expr()->gte('n.kvadratura', "$mink"),
                $upit->expr()->lte('n.kvadratura', "$maxk"),
                $upit->expr()->gte('n.brSoba', "$mins"),
                $upit->expr()->lte('n.brSoba', "$maxs"),
                $upit->expr()->between('n.godinaIzgradnje', '?1', '?2'),
                $upit->expr()->gte('n.ukupnaSpratnost', "$minSprat"),
                $upit->expr()->lte('n.ukupnaSpratnost', "$maxSprat"),
                $upit->expr()->eq('n.opstina', "$opstina")))
            ->setParameters(['1' => $ming, '2' => $maxg]);
        }
        //return  $upit->getQuery()->getDQL();
        return $upit->getQuery()->getResult();
    }

    /*
     * funkcija koja vraca rezultate napredne pretrage kupca ako je uneta lokacija mikrolokacija
     *
     * @param int $minc, int $maxc, int $mink, int $maxk, int $mins, int $maxs, int $minSprat, int $maxSprat, Mikrolokacija $lokacija, Tip $tip, string $ming, string $maxg, string $stanje
     *
     * @return Nekretnina[]
     */
    public function naprednaLokacije($minc, $maxc, $mink, $maxk, $mins, $maxs, $minSprat, $maxSprat, $lokacija, $tip, $ming, $maxg, $stanje)
    {
        if ($stanje==""){
            $status = "'Aktivno'";
            $ming = date_create_from_format("Y-m-d", $ming);
            $maxg = date_create_from_format("Y-m-d", $maxg);
            $upit = $this->getEntityManager()->createQueryBuilder();

            $upit->select('n')
                ->from('App\Models\Entities\Nekretnina', 'n')
                ->innerJoin('App\Models\Entities\Tipnekretnine', 't', 'WITH', 't.idtipnekretnine = n.tip')
                ->innerJoin("App\Models\Entities\Mikrolokacija", 'm', 'WITH', 'm.idmikro= n.mikrolokacija')
                ->where($upit->expr()->andX(
                    $upit->expr()->eq('n.tip', "$tip"),
                    $upit->expr()->eq('n.status', $status),
                    $upit->expr()->lte('n.cena', "$maxc"),
                    $upit->expr()->gte('n.cena', "$minc"),
                    $upit->expr()->gte('n.kvadratura', "$mink"),
                    $upit->expr()->lte('n.kvadratura', "$maxk"),
                    $upit->expr()->gte('n.brSoba', "$mins"),
                    $upit->expr()->lte('n.brSoba', "$maxs"),
                    $upit->expr()->between('n.godinaIzgradnje', '?1', '?2'),
                    $upit->expr()->gte('n.ukupnaSpratnost', "$minSprat"),
                    $upit->expr()->lte('n.ukupnaSpratnost', "$maxSprat"),
                    $upit->expr()->eq('n.mikrolokacija', "$lokacija")))
                ->setParameters(['1' => $ming, '2' => $maxg]);
        }
        else{


        $status = "'Aktivno'";
        $ming = date_create_from_format("Y-m-d", $ming);
        $maxg = date_create_from_format("Y-m-d", $maxg);
        $upit = $this->getEntityManager()->createQueryBuilder();

        $upit->select('n')
            ->from('App\Models\Entities\Nekretnina', 'n')
            ->innerJoin('App\Models\Entities\Tipnekretnine', 't', 'WITH', 't.idtipnekretnine = n.tip')
            ->innerJoin("App\Models\Entities\Mikrolokacija", 'm', 'WITH', 'm.idmikro= n.mikrolokacija')
            ->where($upit->expr()->andX(
                $upit->expr()->eq('n.tip', "$tip"),
                $upit->expr()->eq('n.status', $status),
                $upit->expr()->eq('n.stanje',$stanje),
                $upit->expr()->lte('n.cena', "$maxc"),
                $upit->expr()->gte('n.cena', "$minc"),
                $upit->expr()->gte('n.kvadratura', "$mink"),
                $upit->expr()->lte('n.kvadratura', "$maxk"),
                $upit->expr()->gte('n.brSoba', "$mins"),
                $upit->expr()->lte('n.brSoba', "$maxs"),
                $upit->expr()->between('n.godinaIzgradnje', '?1', '?2'),
                $upit->expr()->gte('n.ukupnaSpratnost', "$minSprat"),
                $upit->expr()->lte('n.ukupnaSpratnost', "$maxSprat"),
                $upit->expr()->eq('n.mikrolokacija', "$lokacija")))
            ->setParameters(['1' => $ming, '2' => $maxg]);
        }
        //return  $upit->getQuery()->getDQL();
        return $upit->getQuery()->getResult();
    }

    /*
     * funkcija koja nalazi nekretnine zadatog tipa i na zadatoj mikrolokaciji
     *
     * @param Tip $tip, Mikrolokacija $lokacija
     *
     * @return Nekretnina[]
     */
    public function nadjiSlicneNekretnine($tip, $lokacija)
    {
        $status = "'Aktivno'";
        $upit = $this->getEntityManager()->createQueryBuilder();
        $upit->select('n')
            ->from('App\Models\Entities\Nekretnina', 'n')
            ->innerJoin('App\Models\Entities\Tipnekretnine', 't', 'WITH', 't.idtipnekretnine = n.tip')
            ->innerJoin("App\Models\Entities\Mikrolokacija", 'm', 'WITH', 'm.idmikro= n.mikrolokacija')
            ->where($upit->expr()->andX(
                $upit->expr()->eq('n.tip', "$tip"),
                $upit->expr()->eq('n.status', $status),
                $upit->expr()->eq('n.mikrolokacija', "$lokacija")));
        return $upit->getQuery()->getResult();
    }

    /*
     * funkcija koja vraca rezultate napredne pretrage kupca ako nije uneta lokacija
     *
     * @param int $minc, int $maxc, int $mink, int $maxk, int $mins, int $maxs, int $minSprat, int $maxSprat, Tip $tip, string $ming, string $maxg, string $stanje
     *
     * @return Nekretnina[]
     */
    public function naprednoBezLokacije($minc, $maxc, $mink, $maxk, $mins, $maxs, $minSprat, $maxSprat, $tip, $ming, $maxg, $stanje){
        if ($stanje==""){
            $status = "'Aktivno'";
            $ming = date_create_from_format("Y-m-d", $ming);
            $maxg = date_create_from_format("Y-m-d", $maxg);
            $upit = $this->getEntityManager()->createQueryBuilder();

            $upit->select('n')
                ->from('App\Models\Entities\Nekretnina', 'n')
                ->innerJoin('App\Models\Entities\Tipnekretnine', 't', 'WITH', 't.idtipnekretnine = n.tip')
                ->innerJoin("App\Models\Entities\Mikrolokacija", 'm', 'WITH', 'm.idmikro= n.mikrolokacija')
                ->where($upit->expr()->andX(
                    $upit->expr()->eq('n.tip', "$tip"),
                    $upit->expr()->eq('n.status', $status),
                    $upit->expr()->lte('n.cena', "$maxc"),
                    $upit->expr()->gte('n.cena', "$minc"),
                    $upit->expr()->gte('n.kvadratura', "$mink"),
                    $upit->expr()->lte('n.kvadratura', "$maxk"),
                    $upit->expr()->gte('n.brSoba', "$mins"),
                    $upit->expr()->lte('n.brSoba', "$maxs"),
                    $upit->expr()->between('n.godinaIzgradnje', '?1', '?2'),
                    $upit->expr()->gte('n.ukupnaSpratnost', "$minSprat"),
                    $upit->expr()->lte('n.ukupnaSpratnost', "$maxSprat")))
                ->setParameters(['1' => $ming, '2' => $maxg]);
            //return  $upit->getQuery()->getDQL();
            return $upit->getQuery()->getResult();
        }
        else{
            $status = "'Aktivno'";
            $ming = date_create_from_format("Y-m-d", $ming);
            $maxg = date_create_from_format("Y-m-d", $maxg);
            $upit = $this->getEntityManager()->createQueryBuilder();

            $upit->select('n')
                ->from('App\Models\Entities\Nekretnina', 'n')
                ->innerJoin('App\Models\Entities\Tipnekretnine', 't', 'WITH', 't.idtipnekretnine = n.tip')
                ->where($upit->expr()->andX(
                    $upit->expr()->eq('n.tip', "$tip"),
                    $upit->expr()->eq('n.status', $status),
                    $upit->expr()->eq('n.stanje',$stanje),
                    $upit->expr()->lte('n.cena', "$maxc"),
                    $upit->expr()->gte('n.cena', "$minc"),
                    $upit->expr()->gte('n.kvadratura', "$mink"),
                    $upit->expr()->lte('n.kvadratura', "$maxk"),
                    $upit->expr()->gte('n.brSoba', "$mins"),
                    $upit->expr()->lte('n.brSoba', "$maxs"),
                    $upit->expr()->between('n.godinaIzgradnje', '?1', '?2'),
                    $upit->expr()->gte('n.ukupnaSpratnost', "$minSprat"),
                    $upit->expr()->lte('n.ukupnaSpratnost', "$maxSprat")))
                ->setParameters(['1' => $ming, '2' => $maxg]);
            //return  $upit->getQuery()->getDQL();
            return $upit->getQuery()->getResult();
        }
    }



}