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
        $em = $this->getDoctrine()->getEntityManager();
        //$destacados = $em->getRepository('JetBredaBundle:Alquiler')->findByDestacado(true);

        $q = $em->createQuery('SELECT u FROM JetBredaBundle:Alquiler u WHERE u.destacado = true ORDER BY u.id DESC')
            ->setMaxResults(6)
            ->setFirstResult(0);
        $destacados = $q->getResult();

        return array('destacados' => $destacados);
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
        $contactModel = new \Jet\BredaBundle\Model\Contact();
        $form = $this->createForm(new \Jet\BredaBundle\Form\ContactType(),$contactModel);

        if($this->getRequest()->getMethod() == "POST"){
            $form->bindRequest($this->getRequest());
            if($form->isValid()){

                $message = \Swift_Message::newInstance()
                ->setSubject('Construcciones Breda: Información')
                ->setFrom(array('no_reply@construccionesbreda.com'=>"CC. Breda Mailbot"))
                ->setTo('info@construccionesbreda.com')
                ->setBody(
                    $this->renderView(
                        'JetBredaBundle:Default:email.html.twig',
                        $contactModel->toArray()
                    ),'text/html'
                );

                $this->get('mailer')->send($message);
                
                return array();
            }
        }
        

        return array('form' => $form->createView());
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
