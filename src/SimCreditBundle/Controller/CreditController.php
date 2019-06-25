<?php

namespace SimCreditBundle\Controller;

use SimCreditBundle\Entity\Credit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Credit controller.
 *
 * @Route("credit")
 */
class CreditController extends Controller
{
    /**
     * Lists all credit entities.
     *
     * @Route("/", name="credit_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $credits = $em->getRepository('SimCreditBundle:Credit')->findAll();
        return $this->render('@SimCredit/Default/index.html.twig', array(
            'credits' => $credits,
        ));
    }

    /**
     * Creates a new credit entity.
     *
     * @Route("/new", name="credit_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $credit = new Credit();
        $form = $this->createForm('SimCreditBundle\Form\CreditType', $credit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($credit);
            $em->flush();

            return $this->redirectToRoute('credit_show', array('idCredit' => $credit->getIdcredit()));
        }

        return $this->render('credit/new.html.twig', array(
            'credit' => $credit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a credit entity.
     *
     * @Route("/{idCredit}", name="credit_show")
     * @Method("GET")
     */
    public function showAction(Credit $credit)
    {
        $deleteForm = $this->createDeleteForm($credit);

        return $this->render('credit/show.html.twig', array(
            'credit' => $credit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing credit entity.
     *
     * @Route("/{idCredit}/edit", name="credit_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Credit $credit)
    {
        $deleteForm = $this->createDeleteForm($credit);
        $editForm = $this->createForm('SimCreditBundle\Form\CreditType', $credit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('credit_edit', array('idCredit' => $credit->getIdcredit()));
        }

        return $this->render('credit/edit.html.twig', array(
            'credit' => $credit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a credit entity.
     *
     * @Route("/{idCredit}", name="credit_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Credit $credit)
    {
        $form = $this->createDeleteForm($credit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($credit);
            $em->flush();
        }

        return $this->redirectToRoute('credit_index');
    }

    /**
     * Creates a form to delete a credit entity.
     *
     * @param Credit $credit The credit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Credit $credit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('credit_delete', array('idCredit' => $credit->getIdcredit())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
