<?php

namespace App\Repository;

use App\Entity\Grupo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class GrupoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $managerRegistry)
    {
        parent::__construct($managerRegistry, Grupo::class);
    }

    public function findOrdenados() : array
    {
        return $this->getEntityManager()
            ->createQuery("SELECT g, t FROM App\\Entity\\Grupo g JOIN g.tutor t ORDER BY g.descripcion")
            ->getResult();
    }
}