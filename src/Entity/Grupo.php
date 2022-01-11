<?php

namespace App\Entity;

use App\Repository\GrupoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GrupoRepository::class)
 */
class Grupo
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
    private $descripcion;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $aula;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $planta;

    /**
     * @ORM\OneToMany(targetEntity="Alumno", mappedBy="grupo")
     * @var Alumno[]|Collection
     */
    private $alumnado;

    /**
     * @ORM\OneToOne(targetEntity="Profesor", inversedBy="tutoria")
     * @var Profesor
     */
    private $tutor;

    /**
     * @ORM\ManyToMany(targetEntity="Profesor", mappedBy="grupos")
     * @var Profesor[]|Collection
     */
    private $profesorado;

    /**
     * Convierte el grupo en una cadena
     */
    public function __toString()
    {
        return $this->getDescripcion();
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->alumnado = new ArrayCollection();
        $this->profesorado = new ArrayCollection();
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
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     * @return Grupo
     */
    public function setDescripcion(string $descripcion): Grupo
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    /**
     * @return int
     */
    public function getAula(): int
    {
        return $this->aula;
    }

    /**
     * @param int $aula
     * @return Grupo
     */
    public function setAula(int $aula): Grupo
    {
        $this->aula = $aula;
        return $this;
    }

    /**
     * @return int
     */
    public function getPlanta(): int
    {
        return $this->planta;
    }

    /**
     * @param int $planta
     * @return Grupo
     */
    public function setPlanta(int $planta): Grupo
    {
        $this->planta = $planta;
        return $this;
    }

    /**
     * @return Alumno[]|Collection
     */
    public function getAlumnado(): array
    {
        return $this->alumnado;
    }

    /**
     * @param Alumno[]|Collection $alumnado
     * @return Grupo
     */
    public function setAlumnado($alumnado): Grupo
    {
        $this->alumnado = $alumnado;
        return $this;
    }

    /**
     * @return Profesor
     */
    public function getTutor(): Profesor
    {
        return $this->tutor;
    }

    /**
     * @param Profesor $tutor
     * @return Grupo
     */
    public function setTutor(Profesor $tutor): Grupo
    {
        $this->tutor = $tutor;
        return $this;
    }

    /**
     * @return Profesor[]|Collection
     */
    public function getProfesorado(): array
    {
        return $this->profesorado;
    }

    /**
     * @param Profesor[]|Collection $profesorado
     * @return Grupo
     */
    public function setProfesorado($profesorado): Grupo
    {
        $this->profesorado = $profesorado;
        return $this;
    }
}
