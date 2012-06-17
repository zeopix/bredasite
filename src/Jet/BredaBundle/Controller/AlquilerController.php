<?php

namespace Jet\BredaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Jet\BredaBundle\Entity\Alquiler;
use Jet\BredaBundle\Form\AlquilerType;

/**
 * Alquiler controller.
 *
 * @Route("/admin/alquiler")
 */
class AlquilerController extends Controller
{
    /**
     * Lists all Alquiler entities.
     *
     * @Route("/", name="admin_alquiler")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('JetBredaBundle:Alquiler')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Alquiler entity.
     *
     * @Route("/{id}/show", name="admin_alquiler_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('JetBredaBundle:Alquiler')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Alquiler entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        $foto = new \Jet\BredaBundle\Entity\Foto();

        $form = $this->createForm(new \Jet\BredaBundle\Form\FotoType(), $foto);

        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bindRequest($request);

            $foto->setAlquiler($entity);
            $foto->upload();

            $entity->addFoto($foto);

            $em->persist($foto);
            $em->persist($entity);

            $em->flush();

        }
        return array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
            'fotoForm' => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Alquiler entity.
     *
     * @Route("/new", name="admin_alquiler_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Alquiler();
        $form = $this->createForm(new AlquilerType(), $entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView()
        );
    }

    /**
     * Creates a new Alquiler entity.
     *
     * @Route("/create", name="admin_alquiler_create")
     * @Method("post")
     * @Template("JetBredaBundle:Alquiler:new.html.twig")
     */
    public function createAction()
    {
        $entity = new Alquiler();
        $request = $this->getRequest();
        $form = $this->createForm(new AlquilerType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_alquiler_show', array('id' => $entity->getId())));

        }

        return array(
            'entity' => $entity,
            'form' => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Alquiler entity.
     *
     * @Route("/{id}/edit", name="admin_alquiler_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('JetBredaBundle:Alquiler')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Alquiler entity.');
        }

        $editForm = $this->createForm(new AlquilerType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Alquiler entity.
     *
     * @Route("/{id}/update", name="admin_alquiler_update")
     * @Method("post")
     * @Template("JetBredaBundle:Alquiler:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('JetBredaBundle:Alquiler')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Alquiler entity.');
        }

        $editForm = $this->createForm(new AlquilerType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_alquiler_edit', array('id' => $id)));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Alquiler entity.
     *
     * @Route("/{id}/deleteFoto", name="admin_alquiler_deleteFoto")
     */
    public function deleteFotoAction($id)
    {
        $request = $this->getRequest();

        $em = $this->getDoctrine()->getEntityManager();


        $foto = $em->getRepository('JetBredaBundle:Foto')->find($id);

        $alquiler = $foto->getAlquiler();


        $foto->removeUpload();

        $em->remove($foto);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_alquiler_show', array('id'=>$alquiler->getId())));

    }


    /**
     * Deletes a Alquiler entity.
     *
     * @Route("/{id}/delete", name="admin_alquiler_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('JetBredaBundle:Alquiler')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Alquiler entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_alquiler'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm();
    }
}
