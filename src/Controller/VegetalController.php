<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class VegetalController extends AbstractController{
    #[Route('/vegetal', name: 'app_vegetal')]
    public function index(ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->findBy([], ['id' => 'DESC']);
        return $this->render('vegetal/vegetal.html.twig', [
            "articles" => $articles,
        ]);
    }

    #[Route("vegetal/add", name:"app_vegetal_add")]
    public function vegetalAdd(Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if( $form->isSubmitted() && $form->isValid() ){
            $entityManagerInterface->persist($article);
            $entityManagerInterface->flush();

            $this->addFlash("success", "L'article a bien été ajouté.");
            return $this->redirectToRoute("app_vegetal");
        }

        return $this->render("vegetal/vegetalAdd.html.twig", [
            "articleForm" => $form->createView(),
        ]);
    }

    #[Route("vegetal/edit/{id}", name:"app_vegetal_edit")]
    public function vegetalEdit(Article $article, Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        // $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if( $form->isSubmitted() && $form->isValid() ){
            $entityManagerInterface->persist($article);
            $entityManagerInterface->flush();

            $this->addFlash("success", "L'article a bien été modifié.");
            return $this->redirectToRoute("app_vegetal");
        }

        return $this->render("vegetal/vegetalEdit.html.twig", [
            "articleForm" => $form->createView(),
        ]);
    }

    #[Route("vegetal/delete/{id}", name:"app_vegetal_delete")]
    public function vegetalDelete(Article $article, Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        if($this->isCsrfTokenValid("SUP".$article->getId(),$request->get("_token"))){
            $entityManagerInterface->remove($article);
            $entityManagerInterface->flush();
            $this->addFlash("success", "L'article a bien été supprimé.");
            return $this->redirectToRoute("app_vegetal");
        }
    }
}
