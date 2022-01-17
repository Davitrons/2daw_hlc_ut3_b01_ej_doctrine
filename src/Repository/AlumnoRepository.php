<?php

namespace App\Repository;

use App\Entity\Alumno;
use App\Entity\Grupo;
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

    public function findNombre(string $nombre) : array
    {
        return $this->getEntityManager()
            ->createQuery("SELECT a, g FROM App\\Entity\\Alumno a JOIN a.grupo g WHERE a.nombre = :name")
            ->setParameter('name', $nombre)
            ->getResult();
    }

    public function findPrimerApellido(string $apellido) : array
    {
        return $this->getEntityManager()
            ->createQuery("SELECT a FROM App\\Entity\\Alumno a WHERE a.apellidos LIKE :apellidos")
            ->setParameter('apellidos', $apellido . '%')
            ->getResult();
    }

    public function findAnioNacimiento(int $anio) : array
    {
        $inicio = new \DateTime($anio . '-01-01 00:00:00');
        $fin = new \DateTime(($anio + 1) . '-01-01 00:00:00');

        return $this->getEntityManager()
            ->createQuery("SELECT a FROM App\\Entity\\Alumno a WHERE a.fechaNacimiento >= :inicio AND a.fechaNacimiento < :fin")
            ->setParameter('inicio', $inicio)
            ->setParameter('fin', $fin)
            ->getResult();
    }

    public function countAnioNacimiento(int $anio) : int
    {
        $inicio = new \DateTime($anio . '-01-01 00:00:00');
        $fin = new \DateTime(($anio + 1) . '-01-01 00:00:00');

        return $this->getEntityManager()
            ->createQuery("SELECT COUNT(a) FROM App\\Entity\\Alumno a WHERE a.fechaNacimiento >= :inicio AND a.fechaNacimiento < :fin")
            ->setParameter('inicio', $inicio)
            ->setParameter('fin', $fin)
            ->getSingleScalarResult();
    }

    public function findAnioNacimientoOrdenado(int $anio) : array
    {
        $inicio = new \DateTime($anio . '-01-01 00:00:00');
        $fin = new \DateTime(($anio + 1) . '-01-01 00:00:00');

        return $this->getEntityManager()
            ->createQuery("SELECT a FROM App\\Entity\\Alumno a WHERE a.fechaNacimiento >= :inicio AND a.fechaNacimiento < :fin ORDER BY a.fechaNacimiento DESC")
            ->setParameter('inicio', $inicio)
            ->setParameter('fin', $fin)
            ->getResult();
    }

    public function findPorGrupoOrdenados(Grupo $grupo) : array
    {
        return $this->getEntityManager()
            ->createQuery("SELECT a FROM App\\Entity\\Alumno a WHERE a.grupo = :grupo ORDER BY a.apellidos, a.nombre")
            ->setParameter('grupo', $grupo)
            ->getResult();
    }
}