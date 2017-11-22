<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Usuario
 *
 * @ORM\Table(
 *     name="usuario",
 *     uniqueConstraints={
 *      @ORM\UniqueConstraint(name="USERNAME_CAN_UNIQ", columns={"username_canonical"}),
 *      @ORM\UniqueConstraint(name="EMAIL_CAN_UNIQ", columns={"email_canonical"}),
 *      @ORM\UniqueConstraint(name="USERNAME_UNIQ", columns={"username"}),
 *      @ORM\UniqueConstraint(name="EMAIL_UNIQ", columns={"email"}),
 *      @ORM\UniqueConstraint(name="CONF_TOKEN_UNIQ", columns={"confirmation_token"})},
 *     indexes={@ORM\Index(name="USUARIO_LUGAR_IDX", columns={"lugar_id"})})
 * @ORM\Entity
 */
class Usuario extends User
{

    /**
     * @var integer
     *
     * @ORM\Column(name="age", type="integer", nullable=true)
     */
    private $age;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birth_date", type="date", nullable=false)
     */
    private $birthDate;

    /**
     * @var string
     *
     * @ORM\Column(name="identifier", type="string", length=50, nullable=false)
     */
    private $identifier;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=100, nullable=true)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=20, nullable=true)
     */
    private $phone;

    /**
     * @var Lugar
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Lugar")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lugar_id", referencedColumnName="id")
     * })
     */
    private $lugar;

    /**
     * @var Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Usuario", mappedBy="friend")
     */
    private $usuario;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->usuario = new ArrayCollection();
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return Usuario
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     *
     * @return Usuario
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set identifier
     *
     * @param string $identifier
     *
     * @return Usuario
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * Get identifier
     *
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Usuario
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
     * Set phone
     *
     * @param string $phone
     *
     * @return Usuario
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return Usuario
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set lugar
     *
     * @param Lugar $lugar
     *
     * @return Usuario
     */
    public function setLugar(Lugar $lugar = null)
    {
        $this->lugar = $lugar;

        return $this;
    }

    /**
     * Get lugar
     *
     * @return Lugar
     */
    public function getLugar()
    {
        return $this->lugar;
    }

    /**
     * Add usuario
     *
     * @param Usuario $usuario
     *
     * @return Usuario
     */
    public function addUsuario(Usuario $usuario)
    {
        $this->usuario[] = $usuario;

        return $this;
    }

    /**
     * Remove usuario
     *
     * @param Usuario $usuario
     */
    public function removeUsuario(Usuario $usuario)
    {
        $this->usuario->removeElement($usuario);
    }

    /**
     * Get usuario
     *
     * @return Collection
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}
