<?php

namespace Jet\BredaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Jet\BredaBundle\Entity\Alquiler;
use Jet\BredaBundle\Form\AlquilerType;

/**
 *
 *
 * @Route("/admin")
 */
class AdminController extends Controller
{
    /**
     *
     * @Route("/home", name="admin_home")
     * @Template()
     */
    public function homeAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('JetBredaBundle:Slider')->findAll();

        $foto = new \Jet\BredaBundle\Entity\Slider();

        $form = $this->createForm(new \Jet\BredaBundle\Form\SliderType(), $foto);

        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bindRequest($request);

            $foto->upload();

            $em->persist($foto);

            $em->flush();
            $entities = $em->getRepository('JetBredaBundle:Slider')->findAll();

        }

        return array('entities' => $entities, 'form' => $form->createView());
    }
    /**
     *
     * @Route("/delete-slider/{id}", name="admin_delete_slider")

     */
    public function deleteSliderAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $entity =  $em->getRepository('JetBredaBundle:Slider')->find($id);

        if(file_exists($entity->getAbsolutePath()))
        {
        unlink($entity->getAbsolutePath());
        }
        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_home'));
    }
}