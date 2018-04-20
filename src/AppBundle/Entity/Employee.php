<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Employee
 * @ApiResource
 * @ORM\Table(name="employee")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EmployeeRepository")
 */
class Employee
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="forname", type="string", length=255)
     */
    private $forname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthname", type="date")
     */
    private $birthname;

    /**
     * @var string
     *
     * @ORM\Column(name="biography", type="text")
     */
    private $biography;


    /**
     * Get id
     *
     * @return int
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
     * @return Employee
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
     * Set forname
     *
     * @param string $forname
     *
     * @return Employee
     */
    public function setForname($forname)
    {
        $this->forname = $forname;

        return $this;
    }

    /**
     * Get forname
     *
     * @return string
     */
    public function getForname()
    {
        return $this->forname;
    }

    /**
     * Set birthname
     *
     * @param \DateTime $birthname
     *
     * @return Employee
     */
    public function setBirthname($birthname)
    {
        $this->birthname = $birthname;

        return $this;
    }

    /**
     * Get birthname
     *
     * @return \DateTime
     */
    public function getBirthname()
    {
        return $this->birthname;
    }

    /**
     * Set biography
     *
     * @param string $biography
     *
     * @return Employee
     */
    public function setBiography($biography)
    {
        $this->biography = $biography;

        return $this;
    }

    /**
     * Get biography
     *
     * @return string
     */
    public function getBiography()
    {
        return $this->biography;
    }
}

