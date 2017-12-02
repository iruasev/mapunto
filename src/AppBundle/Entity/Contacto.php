<?php

namespace AppBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Contacto
 *
 * @ORM\Table(
 *     name="contacto",
 *     uniqueConstraints={
 *      @ORM\UniqueConstraint(name="usuario_id_UNIQUE", columns={"usuario_id"}),
 *      @ORM\UniqueConstraint(name="friend_id_UNIQUE", columns={"friend_id"})
 *     },
 *     indexes={
 *      @ORM\Index(name="USUARIO_IDX", columns={"usuario_id"}),
 *      @ORM\Index(name="FRIEND_IDX", columns={"friend_id"})
 *     }
 * )
 * @ORM\Entity
 */
class Contacto
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
     * @var Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="friend_id", referencedColumnName="id")
     * })
     */
    private $friend;

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
     * @return Contacto
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
     * Set friend
     *
     * @param Usuario $friend
     *
     * @return Contacto
     */
    public function setFriend(Usuario $friend = null)
    {
        $this->friend = $friend;

        return $this;
    }

    /**
     * Get friend
     *
     * @return Usuario
     */
    public function getFriend()
    {
        return $this->friend;
    }

    /**
     * Set usuario
     *
     * @param Usuario $usuario
     *
     * @return Contacto
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
