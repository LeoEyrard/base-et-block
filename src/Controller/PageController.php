<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PageController extends AbstractController
{

        /**
        * @Route("/profile")
        */
        public function profile(){
        return $this->render("accueil.html.twig");
        } 



        // j'ajoute une variame $id
        /**
        * @Route("/article/{id}", name="article")
        */
        public function article($id) //j'integre mon id
        {

            //je cree un article contenant des information
            $articles = [
                1 => [
                    "title" => "arouf gangsta",
                    "content" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta et, facilis laboriosam tenetur unde vero! Ad consequatur, debitis dolorum eos error explicabo id, iusto magni nam odio quas reprehenderit ut.",
                    "image" => "https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/iphone-13-pink-select-2021?wid=940&hei=1112&fmt=png-alpha&.v=1629842709000",
                    "isPublished" => true
                ],
                2 => [
                    "title" => "silvain durif",
                    "content" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta et, facilis laboriosam tenetur unde vero! Ad consequatur, debitis dolorum eos error explicabo id, iusto magni nam odio quas reprehenderit ut.",
                    "image" => "https://images.ladepeche.fr/api/v1/images/view/5c2cea548fe56f588b4c9f7c/full/image.jpg",
                    "isPublished" => true
                ],
                3 => [
                    "title" => "vald",
                    "content" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta et, facilis laboriosam tenetur unde vero! Ad consequatur, debitis dolorum eos error explicabo id, iusto magni nam odio quas reprehenderit ut.",
                    "image" => "https://medias.spotern.com/people/w320/0/150-1532336937.jpg",
                    "isPublished" => true
                ],
                4 => [
                    "title" => "damso",
                    "content" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta et, facilis laboriosam tenetur unde vero! Ad consequatur, debitis dolorum eos error explicabo id, iusto magni nam odio quas reprehenderit ut.",
                    "image" => "https://media-mcetv.ouest-france.fr/wp-content/uploads/2020/02/Damso-un-c%C3%A9l%C3%A8bre-humoriste-le-remercie-de-lavoir-cit%C3%A9-1000.jpg",
                    "isPublished" => true
                ],
                5 => [
                    "title" => "Le PHP c'est vraiment trop génial5",
                    "content" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta et, facilis laboriosam tenetur unde vero! Ad consequatur, debitis dolorum eos error explicabo id, iusto magni nam odio quas reprehenderit ut.",
                    "image" => "https://static1.purepeople.com/articles/7/26/58/37/@/3758746-exclusif-christian-clavier-enregistr-624x600-2.jpg",
                    "isPublished" => true
                ]
            ];

            if (!array_key_exists($id, $articles)) {
                throw $this->createNotFoundException('what are you doing ? we didn t tell you not to do anything on the site?');
            }

            //je retourn une reponse HTTP vers le fichier twig 
            //je recupere un article grace a mon id
            return $this->render("article.html.twig", ["article" => $articles[$id]]);


        }


        /**
        * @Route("/articles", name="articles")
        */
        public function articles() //j'integre mon id
        {

            //je cree un article contenant des information
            $articless = [
                1 => [
                    "title" => "IPHONE",
                    "content" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta et, facilis laboriosam tenetur unde vero! Ad consequatur, debitis dolorum eos error explicabo id, iusto magni nam odio quas reprehenderit ut.",
                    "image" => "https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/iphone-13-pink-select-2021?wid=940&hei=1112&fmt=png-alpha&.v=1629842709000",
                    "isPublished" => true
                ],
                2 => [
                    "title" => "silvain durif",
                    "content" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta et, facilis laboriosam tenetur unde vero! Ad consequatur, debitis dolorum eos error explicabo id, iusto magni nam odio quas reprehenderit ut.",
                    "image" => "https://images.ladepeche.fr/api/v1/images/view/5c2cea548fe56f588b4c9f7c/full/image.jpg",
                    "isPublished" => true
                ],
                3 => [
                    "title" => "vald",
                    "content" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta et, facilis laboriosam tenetur unde vero! Ad consequatur, debitis dolorum eos error explicabo id, iusto magni nam odio quas reprehenderit ut.",
                    "image" => "https://medias.spotern.com/people/w320/0/150-1532336937.jpg",
                    "isPublished" => true
                ],
                4 => [
                    "title" => "damso",
                    "content" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta et, facilis laboriosam tenetur unde vero! Ad consequatur, debitis dolorum eos error explicabo id, iusto magni nam odio quas reprehenderit ut.",
                    "image" => "https://media-mcetv.ouest-france.fr/wp-content/uploads/2020/02/Damso-un-c%C3%A9l%C3%A8bre-humoriste-le-remercie-de-lavoir-cit%C3%A9-1000.jpg",
                    "isPublished" => true
                ],
                5 => [
                    "title" => "Le PHP c'est vraiment trop génial5",
                    "content" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta et, facilis laboriosam tenetur unde vero! Ad consequatur, debitis dolorum eos error explicabo id, iusto magni nam odio quas reprehenderit ut.",
                    "image" => "https://static1.purepeople.com/articles/7/26/58/37/@/3758746-exclusif-christian-clavier-enregistr-624x600-2.jpg",
                    "isPublished" => true
                ]
            ];

            return $this->render("tout.html.twig", ["articles" => $articles]);
    }
}