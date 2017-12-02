<?php

namespace AppBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * UsuarioEvento
 *
 * @ORM\Table(
 *     name="usuario_evento",
 *     indexes={
 *      @ORM\Index(name="UE_USUARIO_IDX", columns={"usuario_id"}),
 *      @ORM\Index(name="UE_EVENTO_IDX", columns={"evento_id"})
 *     }
 * )
 * @ORM\Entity
 */
class UsuarioEvento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(name="is_owner", type="string", nullable=false)
     */
    private $isOwner = 'no';

    /**
     * @var string
     *
     * @ORM\Column(name="declined", type="string", nullable=false)
     */
    private $declined = 'no';

    /**
     * @var Evento
     *
     * @ORM\ManyToOne(targetEntity="Evento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="evento_id", referencedColumnName="id")
     * })
     */
    private $evento;

    /**
     * @var Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     * })
     */
    private $usuario;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set createdAt
     *
     * @param DateTime $createdAt
     *
     * @return UsuarioEvento
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set isOwner
     *
     * @param string $isOwner
     *
     * @return UsuarioEvento
     */
    public function setIsOwner($isOwner)
    {
        $this->isOwner = $isOwner;

        return $this;
    }

    /**
     * Get isOwner
     *
     * @return string
     */
    public function getIsOwner()
    {
        return $this->isOwner;
    }

    /**
     * Set declined
     *
     * @param string $declined
     *
     * @return UsuarioEvento
     */
    public function setDeclined($declined)
    {
        $this->declined = $declined;

        return $this;
    }

    /**
     * Get declined
     *
     * @return string
     */
    public function getDeclined()
    {
        return $this->declined;
    }

    /**
     * Set evento
     *
     * @param Evento $evento
     *
     * @return UsuarioEvento
     */
    public function setEvento(Evento $evento = null)
    {
        $this->evento = $evento;

        return $this;
    }

    /**
     * Get evento
     *
     * @return Evento
     */
    public function getEvento()
    {
        return $this->evento;
    }

    /**
     * Set usuario
     *
     * @param Usuario $usuario
     *
     * @return UsuarioEvento
     */
    public function setUsuario(Usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}
