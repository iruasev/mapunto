<?php

namespace AppBundle\Base;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class BaseCRUDController
 *
 * @package AppBundle\Base
 */
abstract class BaseCRUDController extends FOSRestController implements ClassResourceInterface
{
    // Constant for getting API object name
    const CONTROLLER_NAME_SUFFIX = 'Controller';
    const DISCRIMINATOR          = 'usuario';

    /**
     * @return ObjectRepository
     */
    abstract function getRepository () : ObjectRepository;

    /**
     * @return ObjectManager
     */
    abstract function getManager () : ObjectManager;

    /**
     * @return string
     */
    abstract function getClassName() : string;

    /**
     * By default obtain data filtered by user. Override if behavior is not desired.
     *
     * @return View
     */
    public function cgetAction () : View
    {
        $results = $this->getRepository()->findBy([static::DISCRIMINATOR => $this->getUser()]);

        return $this->view($results, $results ?
            Response::HTTP_OK :
            Response::HTTP_NO_CONTENT);
    }

    /**
     * @param string $id
     *
     * @return View
     */
    public function getAction (string $id) : View
    {
        $result = $this->getRepository()->find($id);

        if (null === $result) {
            throw new NotFoundHttpException($this->getObjectName() . ' not found');
        } elseif ($result->getUsuario() !== $this->getUser()) {
            throw new HttpException(Response::HTTP_UNAUTHORIZED, 'You do not have permission to access to this ' . $this->getObjectName());
        }

        return $this->view($result, Response::HTTP_OK);
    }

    /**
     * @param Request $request
     */
    public function postAction (Request $request)
    {
        throw new MethodNotAllowedHttpException([Request::METHOD_GET]);
    }

    /**
     * @param Request $request
     *
     * @param string  $id
     */
    public function putAction (Request $request, string $id)
    {
        throw new MethodNotAllowedHttpException([Request::METHOD_GET]);
    }

    /**
     * @param Request $request
     *
     * @param string  $id
     */
    public function deleteAction (Request $request, string $id)
    {
        throw new MethodNotAllowedHttpException([Request::METHOD_GET]);
    }

    /**
     * Get current API object name for error messages. E.g. Vehicle, User...
     *
     * @return string
     */
    protected function getObjectName () : string
    {
        $classNameParts = explode('\\', get_class($this));

        return str_replace(static::CONTROLLER_NAME_SUFFIX, '', end($classNameParts));
    }

}