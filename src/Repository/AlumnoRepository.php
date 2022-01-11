<?php

namespace App\Repository;

use App\Entity\Alumno;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AlumnoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $managerRegistry)
    {
        parent::__construct($managerRegistry, Alumno::class);
    }

    public function findNombreMaria() : array
    {
        return $this->findBy(['nombre' => 'María']);
    }

    public function findNombreNoMaria() : array
    {
        return $this->getEntityManager()
            ->createQuery("SELECT a FROM App\\Entity\\Alumno a WHERE a.nombre != 'María'")
            ->getResult();
    }
}