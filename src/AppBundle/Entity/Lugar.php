<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lugar
 *
 * @ORM\Table(
 *     name="lugar",
 *     indexes={
 *      @ORM\Index(name="FK_TIPO_LUGAR_IDX", columns={"tipo_lugar_id"}),
 *      @ORM\Index(name="FK_LUGAR_PAIS_IDX", columns={"pais_id"})
 *     }
 * )
 * @ORM\Entity
 */
class Lugar
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="address_1", type="string", length=250, nullable=true)
     */
    private $address1;

    /**
     * @var string
     *
     * @ORM\Column(name="address_2", type="string", length=250, nullable=true)
     */
    private $address2;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="string", length=250, nullable=false)
     */
    private $latitude;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="string", length=250, nullable=false)
     */
    private $longitude;

    /**
     * @var TipoLugar
     *
     * @ORM\ManyToOne(targetEntity="TipoLugar")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_lugar_id", referencedColumnName="id")
     * })
     */
    private $tipoLugar;

    /**
     * @var Pais
     *
     * @ORM\ManyToOne(targetEntity="Pais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pais_id", referencedColumnName="id")
     * })
     */
    private $pais;



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
     * Set name
     *
     * @param string $name
     *
     * @return Lugar
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set address1
     *
     * @param string $address1
     *
     * @return Lugar
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;

        return $this;
    }

    /**
     * Get address1
     *
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Set address2
     *
     * @param string $address2
     *
     * @return Lugar
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * Get address2
     *
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     *
     * @return Lugar
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     *
     * @return Lugar
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set tipoLugar
     *
     * @param TipoLugar $tipoLugar
     *
     * @return Lugar
     */
    public function setTipoLugar(TipoLugar $tipoLugar = null)
    {
        $this->tipoLugar = $tipoLugar;

        return $this;
    }

    /**
     * Get tipoLugar
     *
     * @return TipoLugar
     */
    public function getTipoLugar()
    {
        return $this->tipoLugar;
    }

    /**
     * Set pais
     *
     * @param Pais $pais
     *
     * @return Lugar
     */
    public function setPais(Pais $pais = null)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get pais
     *
     * @return Pais
     */
    public function getPais()
    {
        return $this->pais;
    }
}
