<?php

namespace App\Entity;

use App\Repository\ParteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParteRepository::class)
 */
class Parte
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Alumno", inversedBy="partes")
     * @var Alumno
     */
    private $alumno;

    /**
     * @ORM\ManyToOne(targetEntity="Profesor", inversedBy="partes")
     * @var Profesor
     */
    private $profesor;

    /**
     * @ORM\Column(type="date")
     * @var \DateTime
     */
    private $fechaCreacion;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    private $avisado;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @var string|null
     */
    private $observaciones;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return Alumno
     */
    public function getAlumno(): Alumno
    {
        return $this->alumno;
    }

    /**
     * @param Alumno $alumno
     * @return Parte
     */
    public function setAlumno(Alumno $alumno): Parte
    {
        $this->alumno = $alumno;
        return $this;
    }

    /**
     * @return Profesor
     */
    public function getProfesor(): Profesor
    {
        return $this->profesor;
    }

    /**
     * @param Profesor $profesor
     * @return Parte
     */
    public function setProfesor(Profesor $profesor): Parte
    {
        $this->profesor = $profesor;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getFechaCreacion(): \DateTime
    {
        return $this->fechaCreacion;
    }

    /**
     * @param \DateTime $fechaCreacion
     * @return Parte
     */
    public function setFechaCreacion(\DateTime $fechaCreacion): Parte
    {
        $this->fechaCreacion = $fechaCreacion;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAvisado(): bool
    {
        return $this->avisado;
    }

    /**
     * @param bool $avisado
     * @return Parte
     */
    public function setAvisado(bool $avisado): Parte
    {
        $this->avisado = $avisado;
        return $this;
    }

    /**
     * @return string
     */
    public function getObservaciones(): ?string
    {
        return $this->observaciones;
    }

    /**
     * @param string $observaciones
     * @return Parte
     */
    public function setObservaciones(?string $observaciones): Parte
    {
        $this->observaciones = $observaciones;
        return $this;
    }
}
