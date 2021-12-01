<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{

    /**
     * @Route("/article2", name="article2")
     */
    public function articleGetShow()
    {
        // je simule une requête en BDD qui récupère des
        // titres d'articles en bdd
       $articles = [
           "article 0",
           "article 1",
           "article 2",
           "article 3",
           "article 4",
           "article 5",
           "article 6"
       ];

       $request = Request::createFromGlobals();

       // maintenant que j'ai récupéré les données de la requête
        // je peux récupérer les parametres d'url de la requête
        // et notamment le parametre "article"
        // ce qui me permet de savoir quel article a été par l'utilisateur
       $article = $request->query->get('article');

        $articleRequested = $articles[$article];

       $response = new Response($articleRequested);
       return $response;
    }

    /**
    * @Route("/article1", name="article2")
    */
    public function articleWildcardShow($article)
    {
        $articles = [
            "article 1",
            "article 2",
            "article 3",
            "article 4",
            "article 5",
            "article 6"
        ];

        $articleRequested = $articles[$article];

        $response = new Response($articleRequested);
        return $response;

        
    }

        

}