<?php

namespace AppBundle\Controller;

use AppBundle\Base\BaseCRUDController;
use AppBundle\Entity\UsuarioEvento;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\View\View;

/**
 * Class EventosController
 *
 * @package AppBundle\Controller
 */
class EventosController extends BaseCRUDController
{
    /**
     * @Get("/eventos")
     *
     * {@inheritdoc}
     */
    public function cgetAction (): View
    {
        return parent::cgetAction();
    }

    /**
     * @Get("/eventos/{id}")
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
        return $this->getDoctrine()->getRepository(UsuarioEvento::class);
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
        return UsuarioEvento::class;
    }
}