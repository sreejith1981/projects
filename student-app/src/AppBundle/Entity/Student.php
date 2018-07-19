<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;




/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StudentRepository")
 * @ORM\Table(name="Student")
 */
class Student
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     *
     * @Assert\NotBlank()
     *
     * @Assert\Regex(
     *     pattern = "/^[a-zA-Z ]+$/",
     *     match = true,
     *     message = "Name can contain only alphabet and space"
     * )
     */
    private $name;




    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=200, nullable=false)
     *
     * @Assert\Regex(
     *     pattern = "/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/",
     *     match = true,
     *     message = "Invalid email"
     * )
     */
    private $email;




    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     *
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     */
    private $createdDate;




    /**
     * @var integer
     *
     * @ORM\Column(name="Id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return Student
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
     * Set email
     *
     * @param string $email
     *
     * @return Student
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }




    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }




    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     *
     * @return Student
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;

        return $this;
    }




    /**
     * Get createdDate
     *
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }




    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
