<?php

namespace AppBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * EventoDocumento
 *
 * @ORM\Table(
 *     name="evento_documento",
 *     indexes={
 *      @ORM\Index(name="DE_EVENTO_IDX", columns={"evento_id"}),
 *      @ORM\Index(name="DE_DOCUMENTO_IDX", columns={"documento_id"})
 *     }
 * )
 * @ORM\Entity
 */
class EventoDocumento
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
     * @var Documento
     *
     * @ORM\ManyToOne(targetEntity="Documento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="documento_id", referencedColumnName="id")
     * })
     */
    private $documento;

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
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set documento
     *
     * @param Documento $documento
     *
     * @return EventoDocumento
     */
    public function setDocumento(Documento $documento = null)
    {
        $this->documento = $documento;

        return $this;
    }

    /**
     * Get documento
     *
     * @return Documento
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Set evento
     *
     * @param Evento $evento
     *
     * @return EventoDocumento
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
}
