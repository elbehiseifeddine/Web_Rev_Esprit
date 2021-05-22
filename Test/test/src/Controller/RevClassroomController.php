<?php

namespace App\Controller;

use App\Entity\Classroom;
use App\Entity\RevClassrom;
use App\Form\RevClassromType;
use App\Repository\RevClassromRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RevClassroomController extends AbstractController
{
    /**
     * @Route("/rev/classroom", name="rev_classroom")
     */
    public function index()
    {
        return $this->render('rev_classroom/index.html.twig', [
            'controller_name' => 'RevClassroomController',
        ]);
    }

    /**
     * @param RevClassromRepository $repository
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/AfficheRevClassroom", name="AfficheRevClassroom")
     */
    public function Affiche(RevClassromRepository $repository){
        // recover the repository
        // we can not use this line, we can call the repository in the function param
        //$repository=$this->getDoctrine()->getRepository(RevClassrom::class);
        // look for *all* the lines from the table RevClassrom and put the result in
        // the variable $classroom
        $classroom=$repository->findAll();
        //send the result to the twig to render it
        return $this->render('RevClassroom/Affiche.html.twig',[
            //table of parameters
            //assosiate classroom with the variable classroom
            'classroom'=>$classroom
        ]);
    }

    /**
     * @Route("/supp/{id}", name="d")
     */
    public function Delete($id,RevClassromRepository $repository){
        $classroom=$repository->find($id);
        // get the entity manager so that you can remove, persist or flush
        $em=$this->getDoctrine()->getManager();
        //remove to remove from database
        $em->remove($classroom);
        //flush to execute the remove (querie)
        $em->flush();
        // after the flush the page redirect to AfficheRevClassroom
        return $this->redirectToRoute('AfficheRevClassroom');
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/RevClassroomAdd",name="Add")
     */
    // Request//httpFoundation
    public function Add(Request $request){
        //instance de l'entite RevClassrom
        $classroom=new RevClassrom();
        //creation de la formulaire
        $form=$this->createForm(RevClassromType::class,$classroom);
        //Button
        $form->add('Ajouter', SubmitType::class);
        // gerer la requet, parcourir la requete est extraire les information de fromulaire
        //la formulaire va analyseé la requete et retourner tous les champs de formulaire
        //il va faire le lien entre les champs du formulaire et l'entity
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            //get the entity manager that exists in doctrine( entity manager and repository)
            $em=$this->getDoctrine()->getManager();
            // tell Doctrine you want to (eventually) save the Product (no queries yet)
            $em->persist($classroom);
            // actually executes the queries
            $em->flush();
            // return to the affiche
            return $this->redirectToRoute('AfficheRevClassroom');
        }
        return $this->render('RevClassroom/Add.html.twig',[
            // on va convertir la $form a un objet centre vers l'affichage qui va ètre recupirer
            //dans la vue et afficher
            'form'=>$form->createView()
        ]);
    }

    /**
     * @Route("/Update/{id}",name="Update")
     */
    public function Update(RevClassromRepository $repository, $id, Request $request){
        $classroom= $repository->find($id);
        $form=$this->createForm(RevClassromType::class,$classroom);
        $form->add('Update',SubmitType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('AfficheRevClassroom');
        }

        return $this->render('RevClassroom/Add.html.twig',[
            'form'=>$form->createView()
        ]);

    }
}







