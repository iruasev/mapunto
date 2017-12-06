<?php

namespace AppBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * UsuarioAficion
 *
 * @ORM\Table(
 *     name="usuario_aficion",
 *     indexes={
 *      @ORM\Index(name="USUARIO_IDX", columns={"usuario_id"}),
 *      @ORM\Index(name="USUARIO_AFICION_IDX", columns={"aficion_id"})
 *     }
 * )
 * @ORM\Entity
 */
class UsuarioAficion
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
     * @var DateTime
     *
     * @ORM\Column(name="created_at", type="date", nullable=false)
     */
    private $createdAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="level", type="integer", nullable=true)
     */
    private $level;

    /**
     * @var Aficion
     *
     * @ORM\ManyToOne(targetEntity="Aficion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="aficion_id", referencedColumnName="id")
     * })
     */
    private $aficion;

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
     * @return UsuarioAficion
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
     * Set level
     *
     * @param integer $level
     *
     * @return UsuarioAficion
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set aficion
     *
     * @param Aficion $aficion
     *
     * @return UsuarioAficion
     */
    public function setAficion(Aficion $aficion = null)
    {
        $this->aficion = $aficion;

        return $this;
    }

    /**
     * Get aficion
     *
     * @return Aficion
     */
    public function getAficion()
    {
        return $this->aficion;
    }

    /**
     * Set usuario
     *
     * @param Usuario $usuario
     *
     * @return UsuarioAficion
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