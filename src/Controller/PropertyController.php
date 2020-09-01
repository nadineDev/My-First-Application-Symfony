<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController{

    /**
     * @Route("/property", name="propertyIndex")
     */
    public function index(){
        return $this->render('property/index.html.twig' , [
            'currentMenu'=> 'property'
        ]);
    }
}