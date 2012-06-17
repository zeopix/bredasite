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
     * @Route("/Alquiler/{id}", name="alquiler")
     * @Template()
     */
    public function alquilerAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $alquiler = $em->getRepository('JetBredaBundle:Alquiler')->find($id);

        return array('entity' => $alquiler);

    }

    /**
     * @Route("/Alquileres", name="alquileres")
     * @Template()
     */
    public function alquileresAction()
    {
        $em = $this->getDoctrine()->getEntityManager();


        $alquileres = $em->getRepository('JetBredaBundle:Alquiler')->findAll();

        return array('Alquileres' => $alquileres);
    }

    /**
     * @Route("/Contacto", name="contacto")
     * @Template()
     */
    public function contactoAction()
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
