<?php

namespace App\Controller;

use App\Entity\Classroom;
use App\Entity\Club;
use App\Entity\Student;
use App\Form\StudentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DevoirController extends AbstractController
{
    /**
     * @Route("/devoir", name="devoir")
     */
    public function index()
    {
        return $this->render('devoir/index.html.twig', [
            'controller_name' => 'DevoirController',
        ]);
    }

    /**
     * @Route("/AfficheClubDB", name="AfficheClubDB")
     */
    public function AfficheDB(){
        $em=$this->getDoctrine()->getRepository(Club::class);
        $list=$em->findAll();
        return $this->render("devoir/AfficheClubFDB.html.twig",
            ['list'=>$list]);
    }

    /**
     * @Route("/deleteClub/{ref}", name="deleteClub")
     */
    public function deleteClub($ref){
        $em=$this->getDoctrine()->GetManager();
        $class=$em->getRepository(Club::class)->find($ref);
        $em->remove($class);
        $em->flush();
        return $this->redirectToRoute("AfficheClubDB");
    }

    /**
     * @Route("/AfficheStudentDB", name="AfficheStudentDB")
     */
    public function AfficheStudentDB(){
        $em=$this->getDoctrine()->getRepository(Student::class);
        $list=$em->findAll();
        return $this->render("devoir/AfficheStudentFDB.html.twig",
            ['list'=>$list]);
    }

    /**
     * @Route("/deleteStudent/{NSC}", name="deleteStudent")
     */
    public function deleteStudent($NSC){
        $em=$this->getDoctrine()->GetManager();
        $class=$em->getRepository(Student::class)->find($NSC);
        $em->remove($class);
        $em->flush();
        return $this->redirectToRoute("AfficheStudentDB");
    }

    /**
     * @Route("/addStudent", name="addStudent")
     */
    public function addStudent(Request $request){
        $student=new Student();
        $form= $this->createForm(StudentType::class, $student);
        $form->add('Ajouter',SubmitType::class); //button with the name 'Ajouter'

        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($student);
            $em->flush();
            return $this->redirectToRoute('AfficheStudentDB');
        }
        return $this->render('devoir/newStudent.html.twig', [
            'f' => $form->createView(),
        ]);
    }

    /**
     * @Route("/updateStudent/{NSC}", name="updateStudent")
     */
    public function updateStudent(Request $request,$NSC){
        $em=$this->getDoctrine()->getManager();
        $student=$em->getRepository(Student::class)->find($NSC);
        $form= $this->createForm(StudentType::class,$student);
        $form->add('Modifier',SubmitType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $em->flush();
            return $this->redirectToRoute('AfficheStudentDB');
        }
        return $this->render('devoir/newStudent.html.twig', [
            'f' => $form->createView(),
        ]);
    }

    
}
