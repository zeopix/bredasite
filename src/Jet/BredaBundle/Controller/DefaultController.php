<?php

namespace Jet\BredaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
         * @Route("/Alquiler", name="alquiler")
         * @Template()
         */
        public function alquilerAction()
        {
            return array();
        }

    /**
         * @Route("/Proyectos-Realizados", name="proyectos")
         * @Template()
         */
        public function proyectosAction()
        {
            return array();
        }

    /**
         * @Route("/Clientes", name="clientes")
         * @Template()
         */
        public function clientesAction()
        {
            return array();
        }

    /**
         * @Route("/Nosotros", name="nosotros")
         * @Template()
         */
        public function nosotrosAction()
        {
            return array();
        }


}
