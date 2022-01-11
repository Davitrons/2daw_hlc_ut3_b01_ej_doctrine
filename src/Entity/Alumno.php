<?php

namespace App\Entity;

use App\Repository\AlumnoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AlumnoRepository::class)
 */
class Alumno
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $nombre;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $apellidos;

    /**
     * @ORM\Column(type="date")
     * @var \DateTime
     */
    private $fechaNacimiento;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    private $observaciones;

    /**
     * @ORM\ManyToOne(targetEntity="Grupo", inversedBy="alumnado")
     * @var Grupo
     */
    private $grupo;

    /**
     * @ORM\OneToMany(targetEntity="Parte", mappedBy="alumno")
     * @var Parte[]|Collection
     */
    private $partes;

    /**
     * Convertir alumno en una cadena
     */
    public function __toString()
    {
        return $this->getApellidos() . ', ' . $this->getNombre() . ' (' . $this->getGrupo() . ')';
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->partes = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     * @return Alumno
     */
    public function setNombre(string $nombre): Alumno
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return string
     */
    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    /**
     * @param string $apellidos
     * @return Alumno
     */
    public function setApellidos(string $apellidos): Alumno
    {
        $this->apellidos = $apellidos;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getFechaNacimiento(): \DateTime
    {
        return $this->fechaNacimiento;
    }

    /**
     * @param \DateTime $fechaNacimiento
     * @return Alumno
     */
    public function setFechaNacimiento(\DateTime $fechaNacimiento): Alumno
    {
        $this->fechaNacimiento = $fechaNacimiento;
        return $this;
    }

    /**
     * @return string
     */
    public function getObservaciones(): string
    {
        return $this->observaciones;
    }

    /**
     * @param string $observaciones
     * @return Alumno
     */
    public function setObservaciones(string $observaciones): Alumno
    {
        $this->observaciones = $observaciones;
        return $this;
    }

    /**
     * @return Grupo
     */
    public function getGrupo(): Grupo
    {
        return $this->grupo;
    }

    /**
     * @param Grupo $grupo
     * @return Alumno
     */
    public function setGrupo(Grupo $grupo): Alumno
    {
        $this->grupo = $grupo;
        return $this;
    }

    /**
     * @return Parte[]|Collection
     */
    public function getPartes(): array
    {
        return $this->partes;
    }

    /**
     * @param Parte[]|Collection $partes
     * @return Alumno
     */
    public function setPartes($partes): Alumno
    {
        $this->partes = $partes;
        return $this;
    }
}
