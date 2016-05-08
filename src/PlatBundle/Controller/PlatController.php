<?php

namespace PlatBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use PlatBundle\Entity\Plat;
use PlatBundle\Form\PlatType;

/**
 * Plat controller.
 *
 */
class PlatController extends Controller
{
    /**
     * Lists all Plat entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $plats = $em->getRepository('PlatBundle:Plat')->findAll();

        return $this->render('PlatBundle:plat:index.html.twig', array(
            'plats' => $plats,
        ));
    }

    /**
     * Creates a new Plat entity.
     *
     */
    public function newAction(Request $request)
    {
        $plat = new Plat();
        $form = $this->createForm('PlatBundle\Form\PlatType', $plat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($plat);
            $em->flush();

            return $this->redirectToRoute('plat_show', array('id' => $plat->getId()));
        }

        return $this->render('PlatBundle:plat:new.html.twig', array(
            'plat' => $plat,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Plat entity.
     *
     */
    public function showAction(Plat $plat)
    {
        $deleteForm = $this->createDeleteForm($plat);

        return $this->render('PlatBundle:plat:show.html.twig', array(
            'plat' => $plat,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Plat entity.
     *
     */
    public function editAction(Request $request, Plat $plat)
    {
        $deleteForm = $this->createDeleteForm($plat);
        $editForm = $this->createForm('PlatBundle\Form\PlatType', $plat);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($plat);
            $em->flush();

            return $this->redirectToRoute('plat_edit', array('id' => $plat->getId()));
        }

        return $this->render('PlatBundle:plat:edit.html.twig', array(
            'plat' => $plat,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Plat entity.
     *
     */
    public function deleteAction(Request $request, Plat $plat)
    {
        $form = $this->createDeleteForm($plat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($plat);
            $em->flush();
        }

        return $this->redirectToRoute('plat_index');
    }

    /**
     * Creates a form to delete a Plat entity.
     *
     * @param Plat $plat The Plat entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Plat $plat)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('plat_delete', array('id' => $plat->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
