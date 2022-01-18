<?php

namespace App\Repository;

use App\Entity\Profesor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ProfesorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $managerRegistry)
    {
        parent::__construct($managerRegistry, Profesor::class);
    }

    public function findOrdenados() : array
    {
        return $this->getEntityManager()
            ->createQuery("SELECT p, t FROM App\\Entity\\Profesor p LEFT JOIN p.tutoria t ORDER BY p.apellidos, p.nombre")
            ->getResult();
    }

    public function findSinPartes() : array
    {
        return $this->getEntityManager()
            ->createQuery("SELECT p FROM App\\Entity\\Profesor p WHERE SIZE(p.partes) = 0")
            ->getResult();
    }
}