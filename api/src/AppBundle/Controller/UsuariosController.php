<?php

namespace AppBundle\Controller;

use AppBundle\Base\BaseCRUDController;
use AppBundle\Entity\Usuario;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\View\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class UsuariosController
 *
 * @package AppBundle\Controller
 */
class UsuariosController extends BaseCRUDController
{
    /**
     * @Get("/usuarios")
     * @Security("is_granted('ROLE_ADMIN')")
     *
     * {@inheritdoc}
     */
    public function cgetAction (): View
    {
        $results = $this->getRepository()->findAll();

        return $this->view($results, $results ?
            Response::HTTP_OK :
            Response::HTTP_NO_CONTENT);
    }

    /**
     * @Get("/usuarios/{id}")
     * @Security("is_granted('ROLE_ADMIN')")
     *
     * {@inheritdoc}
     */
    public function getAction (string $id): View
    {
        $result = $this->getRepository()->find($id);

        if (null === $result) {
            throw new NotFoundHttpException($this->getObjectName() . ' not found');
        }

        return $this->view($result, Response::HTTP_OK);
    }

    /**
     * {@inheritdoc}
     */
    function getRepository () : ObjectRepository
    {
        return $this->getDoctrine()->getRepository(Usuario::class);
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
        return Usuario::class;
    }
}