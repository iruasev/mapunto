<?php

namespace AppBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * CategoriaAficion
 *
 * @ORM\Table(name="categoria_aficion", indexes={@ORM\Index(name="CA_CATEGORIA_IDX", columns={"categoria_id"}), @ORM\Index(name="CA_AFICION_IDX", columns={"aficion_id"})})
 * @ORM\Entity
 */
class CategoriaAficion
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
     * @var Aficion
     *
     * @ORM\ManyToOne(targetEntity="Aficion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="aficion_id", referencedColumnName="id")
     * })
     */
    private $aficion;

    /**
     * @var Categoria
     *
     * @ORM\ManyToOne(targetEntity="Categoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categoria_id", referencedColumnName="id")
     * })
     */
    private $categoria;

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
     * @return CategoriaAficion
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
     * Set aficion
     *
     * @param Aficion $aficion
     *
     * @return CategoriaAficion
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
     * Set categoria
     *
     * @param Categoria $categoria
     *
     * @return CategoriaAficion
     */
    public function setCategoria(Categoria $categoria = null)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return Categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }
}
