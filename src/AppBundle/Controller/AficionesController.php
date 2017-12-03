<?php

namespace AppBundle\Controller;

use AppBundle\Base\BaseCRUDController;
use AppBundle\Entity\UsuarioAficion;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\View\View;

/**
 * Class AficionesController
 *
 * @package AppBundle\Controller
 */
class AficionesController extends BaseCRUDController
{
    /**
     * @Get("/aficiones")
     *
     * {@inheritdoc}
     */
    public function cgetAction (): View
    {
        return parent::cgetAction();
    }

    /**
     * @Get("/aficiones/{id}")
     *
     * {@inheritdoc}
     */

    public function getAction (string $id): View
    {
        return parent::getAction($id);
    }

    /**
     * {@inheritdoc}
     */
    function getRepository () : ObjectRepository
    {
        return $this->getDoctrine()->getRepository(UsuarioAficion::class);
    }

    /**
     * {@inheritdoc}
     */
    function getManager () : ObjectManager
    {
        return $this->getDoctrine()->getManager();
    }

    /**
     * {@inheritdoc}
     */
    function getClassName () : string
    {
        return UsuarioAficion::class;
    }
}