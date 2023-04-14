<?php

namespace App\Controller;
use App\Entity\Livres;

use App\Repository\LivresRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LivresController extends AbstractController
{
    /*#[Route('/livres/{id}', name: 'app_livres_id')]
    public function index($id,ManagerRegistry $doctrine): Response
    {
        $rep=$doctrine->getRepository(Livres::class);
        $livre=$rep->find($id);
        dd($livre);

    }
    #[Route('/livres/{id}', name: 'app_livres_id')]
    public function index(Livres $livre,ManagerRegistry $doctrine): Response
    {
        $rep=$doctrine->getRepository(Livres::class);
        $livre=$rep->find($id);
        dd($livre);

    }
    */
    #[Route('/livres/{id}', name: 'app_livres_id')]
    public function index($id,LivresRepository $rep): Response
    {
        $livre=$rep->find($id);
        dd($livre);

    }

    #[Route('/livres', name: 'app_livres')]
    public function findAll(LivresRepository $rep ): Response
    {
        $livres=$rep->findAll();
        dd($livres);

    }
    #[Route('admin/livres/add', name: 'admin_app_livres')]
    public function add(ManagerRegistry $doctrine): Response
    {   $dateedition=new \DateTime('2022-01-01');
        $livre=new Livres();
        $livre->setLibelle('Reseau')
            ->setPrix(1111)
            ->setTitre('xxxxxx')
            ->setImage('https://via.placeholder.com/300')
            ->setEditeur('Eyrolles')
            ->setResume("bla bla bla")
            ->setDateEdition($dateedition);
        $rep=$doctrine->getManager();
        $em->persist($livre);
        $em->flush();
        dd($livre);


    }
    #[Route('admin/livres/update/{id}', name: 'app_livres_id')]
    public function update($id,ManagerRegistry $doctrine): Response
    {
        $rep=$doctrine->getRepository(Livres::class);
        $livre=$rep->find($id);
         $livre->setPrix(111);
      $em=$doctrine->getManager();
          $em->flush();
        dd($livre);

    }
    #[Route('admin/livres/delete/{id}', name: 'app_livres_id')]
    public function delete($id,ManagerRegistry $doctrine): Response
    {
        $rep=$doctrine->getRepository(Livres::class);
        $livre=$rep->find($id);
        $em=$doctrine->getManager();
        $em->remove($livre);
        $em->flush();
        dd($livre);

    }
}
