<?php

namespace App\Controller;

use App\Entity\Grupo;
use App\Entity\Profesor;
use App\Repository\AlumnoRepository;
use App\Repository\GrupoRepository;
use App\Repository\ParteRepository;
use App\Repository\ProfesorRepository;
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
        return $this->render('ejercicios/ap9.html.twig', [
            'grupos' => $grupos
        ]);
    }

    /**
     * @Route("/ap10", name="apartado10")
     */
    public function gruposConEnlaces(GrupoRepository $grupoRepository): Response
    {
        $grupos = $grupoRepository->findOrdenados();
        return $this->render('ejercicios/ap10.html.twig', [
            'grupos' => $grupos
        ]);
    }

    /**
     * @Route("/ap10/{id}", name="apartado10_alumnado")
     */
    public function alumnadoConEnlaces(AlumnoRepository $alumnoRepository, Grupo $grupo): Response
    {
        $alumnado = $alumnoRepository->findPorGrupoOrdenados($grupo);
        return $this->render('ejercicios/ap10_alumnado.html.twig', [
            'alumnos' => $alumnado,
            'grupo' => $grupo
        ]);
    }

    /**
     * @Route("/ap11", name="apartado11")
     */
    public function profesoradoConEnlace(ProfesorRepository $profesorRepository): Response
    {
        $profesorado = $profesorRepository->findOrdenados();
        return $this->render('ejercicios/ap11.html.twig', [
            'profesorado' => $profesorado
        ]);
    }

    /**
     * @Route("/ap11/{id}", name="apartado11_partes")
     */
    public function partesDeProfesor(ParteRepository $parteRepository, Profesor $profesor): Response
    {
        $partes = $parteRepository->findByProfesorOrdenados($profesor);
        return $this->render('ejercicios/ap11_partes.html.twig', [
            'partes' => $partes
        ]);
    }

    /**
     * @Route("/ap12", name="apartado12")
     */
    public function estudiantesConPartesInvertido(AlumnoRepository $alumnoRepository): Response
    {
        $resultado = $alumnoRepository->findPorPartesDecrecientes();
        return $this->render('ejercicios/ap12.html.twig', [
            'elementos' => $resultado
        ]);
    }

    /**
     * @Route("/ap13/{texto}", name="apartado13")
     */
    public function partesConTexto(ParteRepository $parteRepository, string $texto): Response
    {
        $partes = $parteRepository->findByContenidoObservaciones($texto);
        return $this->render('ejercicios/ap13.html.twig', [
            'partes' => $partes
        ]);
    }

    /**
     * @Route("/ap14", name="apartado14")
     */
    public function profesoradoSinPartes(ProfesorRepository $profesorRepository): Response
    {
        $profesores = $profesorRepository->findSinPartes();
        return $this->render('ejercicios/ap14.html.twig', [
            'profesorado' => $profesores
        ]);
    }

    /**
     * @Route("/ap15", name="apartado15")
     */
    public function alumnadoSinPartes(AlumnoRepository $alumnoRepository): Response
    {
        $alumnado = $alumnoRepository->findSinPartes();
        return $this->render('ejercicios/ap15.html.twig', [
            'alumnos' => $alumnado,
        ]);
    }
}
