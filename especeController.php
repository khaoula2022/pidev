<?php

namespace EventBundle\Controller;

use EventBundle\Entity\espece;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Espece controller.
 *
 */
class especeController extends Controller
{
    /**
     * Lists all espece entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $especes = $em->getRepository('EventBundle:espece')->findAll();

        return $this->render('espece/index.html.twig', array(
            'especes' => $especes,
        ));
    }

    /**
     * Creates a new espece entity.
     *
     */
    public function newAction(Request $request)
    {
        $espece = new Espece();
        $form = $this->createForm('EventBundle\Form\especeType', $espece);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($espece);
            $em->flush();

            return $this->redirectToRoute('espece_show', array('id' => $espece->getId()));
        }

        return $this->render('espece/new.html.twig', array(
            'espece' => $espece,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a espece entity.
     *
     */
    public function showAction(espece $espece)
    {
        $deleteForm = $this->createDeleteForm($espece);

        return $this->render('espece/show.html.twig', array(
            'espece' => $espece,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing espece entity.
     *
     */
    public function editAction(Request $request, espece $espece)
    {
        $deleteForm = $this->createDeleteForm($espece);
        $editForm = $this->createForm('EventBundle\Form\especeType', $espece);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('espece_edit', array('id' => $espece->getId()));
        }

        return $this->render('espece/edit.html.twig', array(
            'espece' => $espece,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a espece entity.
     *
     */
    public function deleteAction(Request $request, espece $espece)
    {
        $form = $this->createDeleteForm($espece);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($espece);
            $em->flush();
        }

        return $this->redirectToRoute('espece_index');
    }

    /**
     * Creates a form to delete a espece entity.
     *
     * @param espece $espece The espece entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(espece $espece)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('espece_delete', array('id' => $espece->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
