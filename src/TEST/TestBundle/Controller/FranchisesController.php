<?php

namespace TEST\TestBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use TEST\TestBundle\Entity\Franchises;
use TEST\TestBundle\Form\FranchisesType;

/**
 * Franchises controller.
 *
 */
class FranchisesController extends Controller
{

    /**
     * Lists all Franchises entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TestBundle:Franchises')->findAll();

        return $this->render('TestBundle:Franchises:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Franchises entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Franchises();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('franchises_show', array('id' => $entity->getId())));
        }

        return $this->render('TestBundle:Franchises:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Franchises entity.
    *
    * @param Franchises $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Franchises $entity)
    {
        $form = $this->createForm(new FranchisesType(), $entity, array(
            'action' => $this->generateUrl('franchises_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Franchises entity.
     *
     */
    public function newAction()
    {
        $entity = new Franchises();
        $form   = $this->createCreateForm($entity);

        return $this->render('TestBundle:Franchises:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Franchises entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TestBundle:Franchises')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Franchises entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TestBundle:Franchises:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Franchises entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TestBundle:Franchises')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Franchises entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TestBundle:Franchises:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Franchises entity.
    *
    * @param Franchises $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Franchises $entity)
    {
        $form = $this->createForm(new FranchisesType(), $entity, array(
            'action' => $this->generateUrl('franchises_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Franchises entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TestBundle:Franchises')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Franchises entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('franchises_edit', array('id' => $id)));
        }

        return $this->render('TestBundle:Franchises:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Franchises entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TestBundle:Franchises')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Franchises entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('franchises'));
    }

    /**
     * Creates a form to delete a Franchises entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('franchises_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
