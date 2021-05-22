<?php

namespace App\Controller;

use App\Entity\Classroom;
use App\Form\ClassroomType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Event\SubmitEvent;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Annotation\Route;

class ClubController extends AbstractController
{
    /**
     * @Route("/club", name="club")
     */
    public function index()
    {
        return $this->render('club/index.html.twig', [
            'controller_name' => 'ClubController',
        ]);
    }

    /**
     * @param $name
     * @Route("/Affiche/{name}", name="Affiche")
     */
    public function GetName($name)
    {
        return $this->render('club/AfficheNom.html.twig', ['n'=>$name]);
    }

    /**
     * @Route("/List", name="List")
     */

    public function Liste(){
        $formations = array(
            array('ref' => 'form147', 'Titre' => 'Formation Symfony
4','Description'=>'formation pratique',
                'date_debut'=>'12/06/2020', 'date_fin'=>'19/06/2020',
                'nb_participants'=>19) ,
            array('ref'=>'form177','Titre'=>'Formation SOA' ,
                'Description'=>'formation
theorique','date_debut'=>'03/12/2020','date_fin'=>'10/12/2020',
                'nb_participants'=>0),
            array('ref'=>'form178','Titre'=>'Formation Angular' ,
                'Description'=>'formation
theorique','date_debut'=>'10/06/2020','date_fin'=>'14/06/2020',
                'nb_participants'=>12));
        return $this->render("club/Liste.html.twig",
        ['formation'=>$formations]);
    }

    /**
     * @Route("/Detail/{id}", name="Detail")
     */
    public function Detail($id){
        return $this->render("club/Detail.html.twig",
        ['ref'=>$id]);
    }

    /**
     * @Route("/AfficheDB", name="AfficheDB")
     */
    public function AfficheDB(){
        $em=$this->getDoctrine()->getRepository(Classroom::class);
        $list=$em->findAll();
        return $this->render("club/AfficheFDB.html.twig",
            ['list'=>$list]);
    }

    /**
     * @Route("/deleteClassrom/{id}", name="deleteClassrom")
     */
    public function deleteClassrom($id){
        $em=$this->getDoctrine()->GetManager();
        $class=$em->getRepository(Classroom::class)->find($id);
        $em->remove($class);
        $em->flush();
        return $this->redirectToRoute("AfficheDB");
    }

    /**
     * @Route("/addClassroom", name="addClassroom")
     */
    public function addClassroom(Request $request){
        $classroom=new Classroom();
        $form= $this->createForm(ClassroomType::class, $classroom);
        $form->add('Ajouter',SubmitType::class); //button with the name 'Ajouter'
        $form->handleRequest($request);
            if($form->isSubmitted()){
                $em=$this->getDoctrine()->getManager();
                $em->persist($classroom);
                $em->flush();
                return $this->redirectToRoute('AfficheDB');
            }
        return $this->render('club/newClassroom.html.twig', [
            'f' => $form->createView(),
        ]);
    }

    /**
     * @Route("/updateClassroom/{id}", name="updateClassroom")
     */
    public function updateClassroom(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $classroom=$em->getRepository(Classroom::class)->find($id);
        $form= $this->createForm(ClassroomType::class,$classroom);
        $form->add('Modifier',SubmitType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->flush();
            return $this->redirectToRoute('AfficheDB');
        }
        return $this->render('club/newClassroom.html.twig', [
            'f' => $form->createView(),
        ]);
    }

}
