<?php

namespace TEST\TestBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use TestBundle\Entity\Titles;
use TestBundle\Form\TitlesType;

/**
 * Titles controller.
 *
 */
class TitlesController extends Controller
{

    /**
     * Lists all Titles entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TestBundle:Titles')->findAll();

        return $this->render('TestBundle:Titles:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Titles entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Titles();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('titles_show', array('id' => $entity->getId())));
        }

        return $this->render('TestBundle:Titles:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    
    /**
     * Creates a new Titles entity.
     * @Template(engine="php")
     */
    public function addAction(Request $request)
    {
        $entity = new Titles();
        //$form = $this->createCreateForm($entity);
        //$form->handleRequest($request);

        /*if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('titles_show', array('id' => $entity->getId())));
        }

        return $this->render('TestBundle:Titles:add.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));*/
        $clients = ["HBO TV", "WB TV", "Sony Japan", "WB Film", "MGM", "Sony"];
        $dropDownList = new \Kendo\UI\DropDownList($clients);
        $dropDownList->autoBind(true);
        //$thing = print($dropDownList->render());
        
        return $this->render('TestBundle:Titles:add.html.twig', 
                    [
                        'entity'        =>  $entity, 
                        'clients'       =>  $clients,
                        'dropdownlist'  =>  $dropDownList
                        //'thing'         =>  $thing 
                    ]
        );
    }

    /**
    * Creates a form to create a Titles entity.
    *
    * @param Titles $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Titles $entity)
    {
        $form = $this->createForm(new TitlesType(), $entity, array(
            'action' => $this->generateUrl('titles_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Titles entity.
     *
     */
    public function newAction()
    {
        $entity = new Titles();
        $form   = $this->createCreateForm($entity);

        return $this->render('TestBundle:Titles:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Titles entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TestBundle:Titles')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Titles entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TestBundle:Titles:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Titles entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TestBundle:Titles')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Titles entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TestBundle:Titles:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Titles entity.
    *
    * @param Titles $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Titles $entity)
    {
        $form = $this->createForm(new TitlesType(), $entity, array(
            'action' => $this->generateUrl('titles_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Titles entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TestBundle:Titles')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Titles entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('titles_edit', array('id' => $id)));
        }

        return $this->render('TestBundle:Titles:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Titles entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TestBundle:Titles')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Titles entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('titles'));
    }

    /**
     * Creates a form to delete a Titles entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('titles_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
