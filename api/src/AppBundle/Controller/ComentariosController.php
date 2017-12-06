<?php

namespace AppBundle\Controller;

use AppBundle\Base\BaseCRUDController;
use AppBundle\Entity\Comentario;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

/**
 * Class ComentariosController
 *
 * @package AppBundle\Controller
 */
class ComentariosController extends BaseCRUDController
{
    /**
     * {@inheritdoc}
     */
    public function cgetAction (): View
    {
        throw new MethodNotAllowedHttpException([Request::METHOD_GET], 'Only is allowed by passing the evento id. ');
    }

    /**
     * @Get("/comentarios/{id}")
     *
     * {@inheritdoc}
     */

    public function getAction (string $id): View
    {
        $results = $this->getRepository()->findBy(['evento' => $id]);

        return $this->view($results, $results ? Response::HTTP_OK : Response::HTTP_NO_CONTENT);
    }

    /**
     * {@inheritdoc}
     */
    function getRepository () : ObjectRepository
    {
        return $this->getDoctrine()->getRepository(Comentario::class);
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
        return Comentario::class;
    }
}