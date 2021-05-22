<?php

namespace App\Controller;

use App\Entity\RevStudent;
use App\Form\RevClassromType;
use App\Form\RevStudentType;
use App\Repository\RevStudentRepository;
use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RevStudentController extends AbstractController
{
    /**
     * @Route("/rev/student", name="rev_student")
     */
    public function index()
    {
        return $this->render('rev_student/index.html.twig', [
            'controller_name' => 'RevStudentController',
        ]);
    }

    /**
     * @param RevStudentRepository $repository
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/AfficheS", name="AfficheS")
     */

    public function Affiche(RevStudentRepository $repository){
        // recover the repository
        // we can not use this line, we can call the repository in the function param
        //$repository=$this->getDoctrine()->getRepository(RevClassrom::class);
        // look for *all* the lines from the table RevClassrom and put the result in
        // the variable $classroom
        $student=$repository->findAll();
        //send the result to the twig to render it
        return $this->render('RevStudent/Affiche.html.twig',[
            //table of parameters
            //assosiate student with the variable student
            'student'=>$student
        ]);
    }

    /**
     * @Route("/suppS/{id}", name="dS")
     */
    public function Delete($id,RevStudentRepository $repository){
        $classroom=$repository->find($id);
        // get the entity manager so that you can remove, persist or flush
        $em=$this->getDoctrine()->getManager();
        //remove to remove from database
        $em->remove($classroom);
        //flush to execute the remove (querie)
        $em->flush();
        // after the flush the page redirect to AfficheRevClassroom
        return $this->redirectToRoute('AfficheS');
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/SAdd",name="AddS")
     */
    // Request//httpFoundation
    public function Add(Request $request){
        $student=new RevStudent();
        $form=$this->createForm(RevStudentType::class,$student);
        //Button
        $form->add('Ajouter', SubmitType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($student);
            $em->flush();
            return $this->redirectToRoute('AfficheS');
        }
        return $this->render('RevStudent/Add.html.twig',[
            'form'=>$form->createView()
        ]);
    }

    /**
     * @Route("/UpdateS/{id}",name="UpdateS")
     */
    public function Update(RevStudentRepository $repository, $id, Request $request){
        $student= $repository->find($id);
        $form=$this->createForm(RevStudentType::class,$student);
        $form->add('Update',SubmitType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('AfficheS');
        }

        return $this->render('RevStudent/Add.html.twig',[
            'form'=>$form->createView()
        ]);

    }

    /**
     * @Route("Recherche",name ="recherche")
     */
    function Recherche(RevStudentRepository $repository,Request $request){
        $data=$request->get('search');
        $student=$repository->findBy(['nsc'=>$data]);
        return $this->render('RevStudent/Affiche.html.twig',[
            //table of parameters
            //assosiate student with the variable student
            'student'=>$student
        ]);




    }
}
