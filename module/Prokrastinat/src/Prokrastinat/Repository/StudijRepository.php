<?php
namespace Prokrastinat\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class StudijRepository extends EntityRepository
{
    public function getStudij(\Prokrastinat\Entity\User $user)
    {
        return $this->findOneBy(array('VpisnaStevilka' => $user->vpisna_st));
    }
    
}