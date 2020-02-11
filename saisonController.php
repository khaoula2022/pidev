<?php

namespace EventBundle\Controller;

use EventBundle\Entity\saison;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Saison controller.
 *
 */
class saisonController extends Controller
{
    /**
     * Lists all saison entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $saisons = $em->getRepository('EventBundle:saison')->findAll();

        return $this->render('saison/index.html.twig', array(
            'saisons' => $saisons,
        ));
    }

    /**
     * Creates a new saison entity.
     *
     */
    public function newAction(Request $request)
    {
        $saison = new Saison();
        $form = $this->createForm('EventBundle\Form\saisonType', $saison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($saison);
            $em->flush();

            return $this->redirectToRoute('saison_show', array('id' => $saison->getId()));
        }

        return $this->render('saison/new.html.twig', array('saison' => $saison, 'form' => $form->createView(),));
    }

    /**
     * Finds and displays a saison entity.
     *
     */
    public function showAction(saison $saison)
    {
        $deleteForm = $this->createDeleteForm($saison);

        return $this->render('saison/show.html.twig', array('saison' => $saison,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing saison entity.
     *
     */
    public function editAction(Request $request, saison $saison)
    {
        $deleteForm = $this->createDeleteForm($saison);
        $editForm = $this->createForm('EventBundle\Form\saisonType', $saison);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('saison_edit', array('id' => $saison->getId()));
        }

        return $this->render('saison/edit.html.twig', array(
            'saison' => $saison,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a saison entity.
     *
     */
    public function deleteAction(Request $request, saison $saison)
    {
        $form = $this->createDeleteForm($saison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($saison);
            $em->flush();
        }

        return $this->redirectToRoute('saison_index');
    }

    /**
     * Creates a form to delete a saison entity.
     *
     * @param saison $saison The saison entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(saison $saison)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('saison_delete', array('id' => $saison->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
