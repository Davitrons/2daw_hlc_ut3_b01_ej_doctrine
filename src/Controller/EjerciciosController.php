<?php

namespace App\Controller;

use App\Repository\AlumnoRepository;
use App\Repository\GrupoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EjerciciosController extends AbstractController
{
    /**
     * @Route("/ap1", name="apartado1")
     */
    public function alumnosLlamadosMaria(AlumnoRepository $alumnoRepository): Response
    {
        $alumnos = $alumnoRepository->findNombreMaria();
        return $this->render('ejercicios/ap1.html.twig', [
            'alumnos' => $alumnos
        ]);
    }

    /**
     * @Route("/ap2", name="apartado2")
     */
    public function alumnosNoLlamadosMaria(AlumnoRepository $alumnoRepository): Response
    {
        $alumnos = $alumnoRepository->findNombreNoMaria();
        return $this->render('ejercicios/ap2.html.twig', [
            'alumnos' => $alumnos
        ]);
    }

    /**
     * @Route("/ap3/{nombre}", name="apartado3")
     */
    public function alumnosPorNombre(AlumnoRepository $alumnoRepository, string $nombre): Response
    {
        $alumnos = $alumnoRepository->findNombre($nombre);
        return $this->render('ejercicios/ap3.html.twig', [
            'alumnos' => $alumnos,
            'nombre' => $nombre
        ]);
    }

    /**
     * @Route("/ap4", name="apartado4")
     */
    public function alumnosOjeda(AlumnoRepository $alumnoRepository): Response
    {
        $alumnos = $alumnoRepository->findPrimerApellido('Ojeda');
        return $this->render('ejercicios/ap4.html.twig', [
            'alumnos' => $alumnos
        ]);
    }

    /**
     * @Route("/ap5", name="apartado5")
     */
    public function alumnosO1997(AlumnoRepository $alumnoRepository): Response
    {
        $alumnos = $alumnoRepository->findAnioNacimiento(1997);
        return $this->render('ejercicios/ap5.html.twig', [
            'alumnos' => $alumnos
        ]);
    }

    /**
     * @Route("/ap6", name="apartado6")
     */
    public function contarAlumnos1997(AlumnoRepository $alumnoRepository): Response
    {
        $numAlumnos = $alumnoRepository->countAnioNacimiento(1997);
        return $this->render('ejercicios/ap6.html.twig', [
            'num_alumnos' => $numAlumnos
        ]);
    }

    /**
     * @Route("/ap7/{anio}", name="apartado7", requirements={"anio": "\d+"})
     */
    public function alumnosAnioNacimiento(AlumnoRepository $alumnoRepository, int $anio): Response
    {
        $alumnos = $alumnoRepository->findAnioNacimientoOrdenado($anio);
        return $this->render('ejercicios/ap7.html.twig', [
            'alumnos' => $alumnos,
            'anio' => $anio
        ]);
    }

    /**
     * @Route("/ap8", name="apartado8")
     */
    public function gruposOrdenados(GrupoRepository $grupoRepository): Response
    {
        $grupos = $grupoRepository->findOrdenados();
        //dump($grupos);
        return $this->render('ejercicios/ap8.html.twig', [
            'grupos' => $grupos
        ]);
    }

    /**
     * @Route("/ap9", name="apartado9")
     */
    public function gruposOrdenadosInverso(GrupoRepository $grupoRepository): Response
    {
        $grupos = $grupoRepository->findOrdenadosDecrecienteConTamanio();
        //dump($grupos);
        return $this->render('ejercicios/ap9.html.twig', [
            'grupos' => $grupos
        ]);
    }
}
