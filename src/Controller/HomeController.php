<?php

namespace App\Controller;

use App\Entity\PersonList;
use App\Repository\PersonListRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/store', name: 'app_store')]
    public function store(Request $request, EntityManagerInterface $entityManager): Response
    {
        $person = new PersonList();
        $person->setName($request->request->get('first-name') . ' ' . $request->request->get('last-name'));
        $person->setLine($request->request->get('line'));
        $person->setCount($request->request->get('count'));
        $person->setScore($request->request->get('score'));
        $entityManager->persist($person);

        $entityManager->flush();

        $this->addFlash('success', 'Schütze wurde übernommen!');

        return $this->redirect('/home');
    }

    #[Route('/list', name: 'app_list')]
    public function list(PersonListRepository $listRepository): Response
    {

        $personList = $listRepository->findLastPerson();

        $personListArray = [
            'name' => $personList->getName(),
            'line' => $personList->getLine(),
            'count' => $personList->getCount(),
            'score' => $personList->getScore()
        ];

        return new JsonResponse([
            'list' => $personListArray
        ]);
    }
}
