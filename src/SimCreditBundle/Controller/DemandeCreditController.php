<?php

namespace SimCreditBundle\Controller;

use SimCreditBundle\Entity\DemandeCredit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Demandecredit controller.
 *
 * @Route("demandecredit")
 */
class DemandeCreditController extends Controller
{
    /**
     * Lists all demandeCredit entities.
     *
     * @Route("/", name="demandecredit_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $demandeCredits = $em->getRepository('SimCreditBundle:DemandeCredit')->findAll();

        return $this->render('demandecredit/index.html.twig', array(
            'demandeCredits' => $demandeCredits,
        ));
    }

    /**
     * Creates a new demandeCredit entity.
     *
     * @Route("/new", name="demandecredit_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $demandeCredit = new Demandecredit();
        $form = $this->createForm('SimCreditBundle\Form\DemandeCreditType', $demandeCredit);
        $form->handleRequest($request);

       /* if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($demandeCredit);
            $em->flush();

            return $this->redirectToRoute('demandecredit_show', array('idDemandeCredit' => $demandeCredit->getIddemandecredit()));
        }
*/
        return $this->render('@SimCredit/Default/index.html.twig', array(
            'demandeCredit' => $demandeCredit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a demandeCredit entity.
     *
     * @Route("/{idDemandeCredit}", name="demandecredit_show")
     * @Method("GET")
     */
    public function showAction(DemandeCredit $demandeCredit)
    {
        $deleteForm = $this->createDeleteForm($demandeCredit);

        return $this->render('demandecredit/show.html.twig', array(
            'demandeCredit' => $demandeCredit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing demandeCredit entity.
     *
     * @Route("/{idDemandeCredit}/edit", name="demandecredit_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DemandeCredit $demandeCredit)
    {
        $deleteForm = $this->createDeleteForm($demandeCredit);
        $editForm = $this->createForm('SimCreditBundle\Form\DemandeCreditType', $demandeCredit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('demandecredit_edit', array('idDemandeCredit' => $demandeCredit->getIddemandecredit()));
        }

        return $this->render('demandecredit/edit.html.twig', array(
            'demandeCredit' => $demandeCredit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a demandeCredit entity.
     *
     * @Route("/{idDemandeCredit}", name="demandecredit_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DemandeCredit $demandeCredit)
    {
        $form = $this->createDeleteForm($demandeCredit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($demandeCredit);
            $em->flush();
        }

        return $this->redirectToRoute('demandecredit_index');
    }

    /**
     * Creates a form to delete a demandeCredit entity.
     *
     * @param DemandeCredit $demandeCredit The demandeCredit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DemandeCredit $demandeCredit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('demandecredit_delete', array('idDemandeCredit' => $demandeCredit->getIddemandecredit())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
