<?php

namespace MappedSuperclassesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="mapped_superclasses_index")
     */
    public function indexAction()
    {
        return $this->render('MappedSuperclassesBundle:Default:index.html.twig');
    }
}
