<?php
// *********************************************************//
// Name: StudentController
// Created by: Sreejith
// Created date: 16-07-2018
// Description: StudentController is a Controller class for
//          create, update, edit and display student details
// *********************************************************//

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Form\StudentType;

use AppBundle\Entity\Student;
use Doctrine\ORM\EntityManagerInterface;


class StudentController extends Controller
{
    /**
     * Display student details
     *
     * @Route("/student/display" ,name = "app_student_display" )
     */
    public function displayAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $queryBuilder = $em->getRepository('AppBundle:Student')->createQueryBuilder('bp');
        if ($request->query->getAlnum('filter')) {
            $queryBuilder->where('bp.name LIKE :name')
                ->setParameter('name', '%' . $request->query->getAlnum('filter') . '%');
        }
        $query = $queryBuilder->getQuery();
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );

        return $this->render('student/datadisplay.html.twig', [
            'data' => $pagination
        ]);
    }



    /**
     * Create new student
     *
     * @Route("/student/insertpage", name="app_student_new")
     */
    public function newAction(Request $request)
    {
        $student = new Student();

        $form = $this->createForm(StudentType::class, $student);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $student = $form->getData();
            $this->getDoctrine()->getRepository('AppBundle:Student')->addStudent($student);

            return $this->redirectToRoute('app_student_display');
        }
        else
        {
            return $this->render('student/datainsert.html.twig', array(
                'form' => $form->createView(),
            ));
        }
    }



    /**
     * Delete selected student
     *
     * @Route("/student/delete/{id}", name="app_student_delete")
     */
    public function deleteAction($id)
    {
        $this->getDoctrine()
            ->getRepository('AppBundle:Student')
            ->deleteStudent($id);

        return $this->redirectToRoute('app_student_display');
    }



    /**
     * Update selected student
     *
     * @Route("/student/update/{id}", name = "app_student_update" )
     */
    public function updateAction($id, Request $request)
    {
        $student = $this->getDoctrine()
            ->getRepository('AppBundle:Student')
            ->find($id);

        if (!$student)
        {
            throw $this->createNotFoundException(
                'No student found for id '.$id
            );
        }


        $form = $this->createForm(StudentType::class, $student);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $student = $form->getData();

            $this->getDoctrine()
                ->getRepository('AppBundle:Student')
                ->addStudent($student);

            return $this->redirectToRoute('app_student_display');
        }
        else
        {
            return $this->render('student/datainsert.html.twig', array(
                'form' => $form->createView(),
            ));
        }
    }
}
?>
