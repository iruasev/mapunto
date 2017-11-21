<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EventoDocumento
 *
 * @ORM\Table(name="evento_documento", indexes={@ORM\Index(name="DE_EVENTO_IDX", columns={"evento_id"}), @ORM\Index(name="DE_DOCUMENTO_IDX", columns={"documento_id"})})
 * @ORM\Entity
 */
class EventoDocumento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
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
     * @var \AppBundle\Entity\Documento
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Documento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="documento_id", referencedColumnName="id")
     * })
     */
    private $documento;

    /**
     * @var \AppBundle\Entity\Evento
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Evento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="evento_id", referencedColumnName="id")
     * })
     */
    private $evento;



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
     * @param \DateTime $createdAt
     *
     * @return EventoDocumento
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set documento
     *
     * @param \AppBundle\Entity\Documento $documento
     *
     * @return EventoDocumento
     */
    public function setDocumento(\AppBundle\Entity\Documento $documento = null)
    {
        $this->documento = $documento;

        return $this;
    }

    /**
     * Get documento
     *
     * @return \AppBundle\Entity\Documento
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Set evento
     *
     * @param \AppBundle\Entity\Evento $evento
     *
     * @return EventoDocumento
     */
    public function setEvento(\AppBundle\Entity\Evento $evento = null)
    {
        $this->evento = $evento;

        return $this;
    }

    /**
     * Get evento
     *
     * @return \AppBundle\Entity\Evento
     */
    public function getEvento()
    {
        return $this->evento;
    }
}
