<?php

namespace Jet\BredaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;

class DefaultController extends Controller
{

        /**
     * @Route("/cookies/{_locale}", name="cookies", defaults={"_locale"="es"})
     * @Template()
     */
    public function cookiesAction()
    {
            return array();
    }
    /**
     * @Route("/{_locale}", name="index", defaults={"_locale"="es"})
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

        $slider = $em->getRepository('JetBredaBundle:Slider')->findAll();

         //Coockie to store the coockie message
        $request = $this->get('request');
        $cookies = $request->cookies;


        if (!$cookies->has('COOCKIE_ACCEPTED')) {
            //genero la coockie
            $cookie = new Cookie('COOCKIE_ACCEPTED', 1, (time() + 3600 * 24 * 7), '/');

            $response = new Response($this->renderView('JetBredaBundle:Default:index.html.twig', array('destacados' => $destacados, 'slider' => $slider, "cookies" => true)));
            $response->headers->setCookie($cookie);
            //$response->send();

            return $response;

        }

        return array('destacados' => $destacados, 'slider' => $slider, "cookies" => false);
    }

    /**
     * @Route("/{_locale}/Alquiler/{id}", name="alquiler", defaults={"_locale"="es"})
     * @Template()
     */
    public function alquilerAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $alquiler = $em->getRepository('JetBredaBundle:Alquiler')->find($id);

        return array('entity' => $alquiler);

    }

    /**
     * @Route("/{_locale}/Alquileres/{type}/{order}", name="alquileres", defaults={"_locale"="es","type"="nave","order"="ASC"})
     * @Template()
     */
    public function alquileresAction($type,$order)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $queryOrder = "ASC";
        if($order == "DESC"){
            $queryOrder = "DESC"; 
        }
        $alquileres = $em->createQuery("SELECT a FROM JetBredaBundle:Alquiler a WHERE a.tipo LIKE :type ORDER BY a.superficie ".$order)
        ->setParameter("type","%".$type."%")
        ->getResult();

        return array('Alquileres' => $alquileres,'order'=>$order,'type'=>$type);
    }

    /**
     * @Route("/{_locale}/Contacto", name="contacto", defaults={"_locale"="es"})
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
     * @Route("/Clientes", name="clientes", defaults={"_locale"="es"})
     * @Template()
     */
    public function clientesAction()
    {
        return array();
    }

    /**
     * @Route("/{_locale}/Nosotros", name="nosotros", defaults={"_locale"="es"})
     * @Template()
     */
    public function nosotrosAction()
    {       
        $clientes = $this->getDoctrine()->getEntityManager()->getRepository('JetBredaBundle:Clientes')->findAll();
        return array('clientes' => $clientes);
    }


}
