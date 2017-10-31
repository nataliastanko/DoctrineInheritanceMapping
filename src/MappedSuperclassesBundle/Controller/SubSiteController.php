<?php

namespace MappedSuperclassesBundle\Controller;

use MappedSuperclassesBundle\Entity\SubSite;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Subsite controller.
 *
 * @Route("subsite")
 */
class SubSiteController extends Controller
{
    /**
     * Lists all subsite entities.
     *
     * @Route("/", name="subsite_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $subsites = $em->getRepository('MappedSuperclassesBundle:SubSite')->findAll();

        return $this->render('MappedSuperclassesBundle:Subsite:index.html.twig', array(
            'subsites' => $subsites,
        ));
    }

    /**
     * Creates a new subsite entity.
     *
     * @Route("/new", name="subsite_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $subsite = new Subsite();
        $form = $this->createForm('MappedSuperclassesBundle\Form\SubSiteType', $subsite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($subsite);
            $em->flush();

            return $this->redirectToRoute('subsite_show', array('id' => $subsite->getId()));
        }

        return $this->render('MappedSuperclassesBundle:Subsite:new.html.twig', array(
            'subsite' => $subsite,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a subsite entity.
     *
     * @Route("/{id}", name="subsite_show")
     * @Method("GET")
     */
    public function showAction(SubSite $subsite)
    {
        $deleteForm = $this->createDeleteForm($subsite);

        return $this->render('MappedSuperclassesBundle:Subsite:show.html.twig', array(
            'subsite' => $subsite,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing subsite entity.
     *
     * @Route("/{id}/edit", name="subsite_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SubSite $subsite)
    {
        $deleteForm = $this->createDeleteForm($subsite);
        $editForm = $this->createForm('MappedSuperclassesBundle\Form\SubSiteType', $subsite);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('subsite_edit', array('id' => $subsite->getId()));
        }

        return $this->render('MappedSuperclassesBundle:Subsite:edit.html.twig', array(
            'subsite' => $subsite,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a subsite entity.
     *
     * @Route("/{id}", name="subsite_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SubSite $subsite)
    {
        $form = $this->createDeleteForm($subsite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($subsite);
            $em->flush();
        }

        return $this->redirectToRoute('subsite_index');
    }

    /**
     * Creates a form to delete a subsite entity.
     *
     * @param SubSite $subsite The subsite entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SubSite $subsite)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('subsite_delete', array('id' => $subsite->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
