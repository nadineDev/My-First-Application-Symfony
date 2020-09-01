<?php
namespace App\Controller;

use App\Entity\Property;
use App\Form\PropertyType;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
class HomeController extends AbstractController{

    /**
     * @Route("/", name="homeIndex")
     */
    public function index(Request $request, PropertyRepository $repository){
          $properties=$repository->findLatest();
          return $this->render('home/index.html.twig', [
              'properties'=>$properties
          ]);
    }

    /**
     * @Route("/show/{slug}-{id}", name="homeShow", requirements={"slug": "[a-z0-9\-]*"})
     */
    public function show(Property $property, string $slug){

        if($property->getSlug() !==$slug){
          return  $this->redirectToRoute('HomeShow', [
                'id'=> $property->getId(),
                'slug'=>$property->getSlug()
            ],301);
        }
        return $this->render('home/show.html.twig', [
            'property'=>$property
        ]);
    }
}