<?php

namespace Compufix\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Compufix\UserBundle\Entity\Message;
use Compufix\UserBundle\Form\MessageType;

/**
 * Message controller.
 *
 * @Route("/message/")
 */
class MessageController extends Controller
{
    /**
     * Lists all Message entities.
     *
     * @Route("/", name="message")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CompufixUserBundle:Message')->findBy(array('userRemitente'=>$this->getUser()));

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Message entity.
     *
     * @Route("/", name="message_create")
     * @Method("POST")
     * @Template("CompufixUserBundle:Message:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Message();
        $form = $this->createForm(new MessageType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('message_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Message entity.
     *
     * @Route("/new", name="message_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Message();
        $form   = $this->createForm(new MessageType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Message entity.
     *
     * @Route("/{id}", name="message_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CompufixUserBundle:Message')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Message entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

   
}
