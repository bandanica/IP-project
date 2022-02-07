<?php

namespace App\Models\Repositories;

use Doctrine\ORM\EntityRepository;

class NekretninaRepository extends EntityRepository
{
    public function findLatest(){
        return $this->findBy(array(),array('idn'=>'ASC'));
    }
}