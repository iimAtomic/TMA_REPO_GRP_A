<?php

namespace App\Controller;

use App\Entity\Personality;
use App\Repository\PersonalityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonalityController extends AbstractController
{
    #[Route('/add-personality', name: 'app_personality', methods: ['GET', 'POST'])]
    public function index(Request $request, PersonalityRepository $repo): Response
    {
        $personality = new Personality();
        $form = $this->createFormBuilder($personality)
            ->add('name', TextType::class)
            ->add('firstname', TextType::class)
            ->add('bornAt', DateTimeType::class, [
                'widget' => 'single_text',
                'input' => 'datetime_immutable',
            ])
            ->add('dieAt', DateTimeType::class, [
                'widget' => 'single_text',
                'input' => 'datetime_immutable',
            ])
            ->add('description', TextareaType::class)
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $repo->save($personality, true);

            return $this->redirectToRoute('app_affich_personality');
        }

        return $this->render('personality/index.html.twig', [
            'form' => $form->createView(),
            'controller_name' => 'PersonalityController',
        ]);
    }


    #[Route('/affiche-personality', name: 'app_affich_personality', methods: ['GET', 'POST'])]
    public function affiche(Request $request, PersonalityRepository $repo): Response
    {
        $perso = $repo->findAll();


        return $this->render('personality/affiche_perso.html.twig', [
            'perso' => $perso,
        ]);
    }
}
