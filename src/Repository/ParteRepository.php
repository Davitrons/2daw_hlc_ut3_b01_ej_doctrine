<?php

namespace App\Repository;

use App\Entity\Parte;
use App\Entity\Profesor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ParteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $managerRegistry)
    {
        parent::__construct($managerRegistry, Parte::class);
    }

    public function findByProfesorOrdenados(Profesor $profesor) : array
    {
        return $this->getEntityManager()
            ->createQuery("SELECT p FROM App\\Entity\\Parte p WHERE p.profesor = :profe ORDER BY p.fechaCreacion DESC")
            ->setParameter('profe', $profesor)
            ->getResult();
    }
}