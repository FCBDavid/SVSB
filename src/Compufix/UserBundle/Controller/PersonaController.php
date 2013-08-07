<?php

namespace Compufix\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Compufix\UserBundle\Entity\Persona;
use Compufix\UserBundle\Form\PersonaType;

/**
 * Persona controller.
 *
 * @Route("/cuenta/informacion/")
 */
class PersonaController extends Controller {

    /**
     * Finds and displays a Persona entity.
     *
     * @Route("/", name="persona_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction() {
        
      $em = $this->getDoctrine()->getManager();
      $entity = $em->getRepository('CompufixUserBundle:Persona')->find($this->getUser()->getPersona()->getId());

      if (!$entity) {
            throw $this->createNotFoundException('No tiene asignado un perfil personal.');
        }
        
        return array(
            'entity' => $entity,
        );
    }

    
    
    
    
    
    /**
     * Displays a form to edit an existing Persona entity.
     *
     * @Route("/{id}/edit", name="persona_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CompufixUserBundle:Persona')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Persona entity.');
        }

        $editForm = $this->createForm(new PersonaType(), $entity);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
        );
    }

    /**
     * Edits an existing Persona entity.
     *
     * @Route("/{id}", name="persona_update")
     * @Method("PUT")
     * @Template("CompufixUserBundle:Persona:edit.html.twig")
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CompufixUserBundle:Persona')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Persona entity.');
        }

        $editForm = $this->createForm(new PersonaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('persona_edit', array('id' => $id)));
        } else {
            $this->get('session')->getFlashBag()->add('msg-error', 'Existen errores en los datos');
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
        );
    }

}
