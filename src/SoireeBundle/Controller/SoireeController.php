<?php

namespace SoireeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SoireeBundle\Entity\Soiree;
use SoireeBundle\Form\SoireeType;

/**
 * Soiree controller.
 *
 */
class SoireeController extends Controller
{
    /**
     * Lists all Soiree entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $soirees = $em->getRepository('SoireeBundle:Soiree')->findAll();

        foreach ($soirees as $key=>$value) {
            $id = $value->getId();
            $nb_participants_par_soiree = $em->getRepository('SoireeBundle:Participation')->getNbParticipantsSoiree($id);
            $value->nbparticipants = $nb_participants_par_soiree;
            $participants_par_soiree = $em->getRepository('SoireeBundle:Participation')->getParticipantsSoiree($id);
            $pps = array();
            foreach  ($participants_par_soiree as $tpps=>$valtpps) {
                foreach  ($valtpps as $tpps2=>$valtpps2) {
                    $pps[$tpps] = $valtpps2;
                }
//                $idp = $valtpps;
//                echo $tpps."<br/>";
//                var_dump($valtpps);exit;
//                $valtpps->nomparticipant = $em->getRepository('UtilBundle:User')->getUsername($idp);
            }
//            var_dump($pps);exit;
//            var_dump($participants_par_soiree);exit;
            $value->participants = $pps;
//            $value->participants = $participants_par_soiree;
        }

       // var_dump($soirees);

        return $this->render('SoireeBundle:soiree:index.html.twig', array(
            'soirees' => $soirees,
        ));
    }

    /**
     * Creates a new Soiree entity.
     *
     */
    public function newAction(Request $request)
    {
        $soiree = new Soiree();
        $form = $this->createForm('SoireeBundle\Form\SoireeType', $soiree);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($soiree);
            $em->flush();

            return $this->redirectToRoute('soiree_show', array('id' => $soiree->getId()));
        }

        return $this->render('SoireeBundle:soiree:new.html.twig', array(
            'soiree' => $soiree,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Soiree entity.
     *
     */
    public function showAction(Soiree $soiree)
    {
        $em = $this->getDoctrine()->getManager();

        $deleteForm = $this->createDeleteForm($soiree);

        $id = $soiree->getId();
//        var_dump($id);exit;
        $nb_participants_de_la_soiree = $em->getRepository('SoireeBundle:Participation')->getNbParticipantsSoiree($id);
        $soiree->nbparticipants = $nb_participants_de_la_soiree;
//        var_dump($nb_participants_de_la_soiree);exit;
        $participants_de_la_soiree = $em->getRepository('SoireeBundle:Participation')->getParticipantsSoiree($id);
        $pps = array();
        foreach  ($participants_de_la_soiree as $pdls=>$valpdls) {
            foreach  ($valpdls as $tpps2=>$valpdls2) {
                $pps[$pdls] = $valpdls2;
            }
//                var_dump($valpdls);exit;
        }
//            var_dump($pps);exit;
//            var_dump($participants_de_la_soiree);exit;
            $soiree->participants = $pps;
//            var_dump($soiree);exit;

        
        
        return $this->render('SoireeBundle:soiree:show.html.twig', array(
            'soiree' => $soiree,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Soiree entity.
     *
     */
    public function editAction(Request $request, Soiree $soiree)
    {
        $deleteForm = $this->createDeleteForm($soiree);
        $editForm = $this->createForm('SoireeBundle\Form\SoireeType', $soiree);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $em = $this->getDoctrine()->getManager();

            if($editForm->get('phsoiree')->getData() != null) {
                if($soiree->getPhotoSoiree() != null) {
                    unlink(__DIR__.'/../../../web/uploads/photosdesoirees/'.$soiree->getPhotoSoiree());
                    $soiree->setPhotoSoiree(null);
                }
            }

            $soiree->preUpload();

            $em->persist($soiree);
            $em->flush();

            return $this->redirectToRoute('soiree_edit', array('id' => $soiree->getId()));
        }

        return $this->render('SoireeBundle:soiree:edit.html.twig', array(
            'soiree' => $soiree,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Soiree entity.
     *
     */
    public function deleteAction(Request $request, Soiree $soiree)
    {
        $form = $this->createDeleteForm($soiree);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($soiree);
            $em->flush();
        }

        return $this->redirectToRoute('soiree_index');
    }

    /**
     * Creates a form to delete a Soiree entity.
     *
     * @param Soiree $soiree The Soiree entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Soiree $soiree)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('soiree_delete', array('id' => $soiree->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
