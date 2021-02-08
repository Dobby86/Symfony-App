<?php

namespace App\Controller;

use App\Entity\Utente;
use App\Form\UtenteType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class MainController extends AbstractController
{
    /**
     * @Route("/contattaci", name="contattaci")
     */
    public function index(Request $request, EntityManagerInterface $entityManagerInterface)
    {
            /**
  * @var Utente $utente 
*/
            
                    $utente = new Utente();

                    $utenteForm = $this -> createForm(UtenteType::class, $utente);
                    //salva i dati inseriti nel form
                    $utenteForm -> handleRequest($request);

        if($utenteForm -> isSubmitted() && $utenteForm->isValid()) {
            //genera la query
            $entityManagerInterface -> persist($utente);
            //manda i dati nel DB
            $entityManagerInterface -> flush();

            $this->addFlash(
                'success',
                'Your changes were saved!'
            );
        };
                    return $this -> render(
                        'pages/utente/index.html.twig', [

                        'controller_name' => 'MainController',

                        'utenteForm' => $utenteForm -> createView()
                        ]
                    );
    }
        /**
         * @Route("/utente/lista", name="utente_lista")
         */
    public function listaUtenti()
    {
        
        return $this -> render('pages/lista_utenti/index.html.twig', []);
    }
    
}
