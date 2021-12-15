<?php

namespace App\Controller;

use App\Entity\CompanyInformation;
use App\Form\CompanyInformationType;
use App\Repository\CompanyInformationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/company/information')]
class CompanyInformationController extends AbstractController
{
    #[Route('/', name: 'company_information_index', methods: ['GET'])]
    public function index(CompanyInformationRepository $companyInformationRepository): Response
    {
        return $this->render('company_information/index.html.twig', [
            'company_informations' => $companyInformationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'company_information_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $companyInformation = new CompanyInformation();
        $form = $this->createForm(CompanyInformationType::class, $companyInformation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($companyInformation);
            $entityManager->flush();

            return $this->redirectToRoute('company_information_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('company_information/new.html.twig', [
            'company_information' => $companyInformation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'company_information_show', methods: ['GET'])]
    public function show(CompanyInformation $companyInformation): Response
    {
        return $this->render('company_information/show.html.twig', [
            'company_information' => $companyInformation,
        ]);
    }

    #[Route('/{id}/edit', name: 'company_information_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CompanyInformation $companyInformation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CompanyInformationType::class, $companyInformation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('company_information_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('company_information/edit.html.twig', [
            'company_information' => $companyInformation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'company_information_delete', methods: ['POST'])]
    public function delete(Request $request, CompanyInformation $companyInformation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$companyInformation->getId(), $request->request->get('_token'))) {
            $entityManager->remove($companyInformation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('company_information_index', [], Response::HTTP_SEE_OTHER);
    }
}
