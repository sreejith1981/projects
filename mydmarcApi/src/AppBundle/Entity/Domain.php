<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Domain
 *
 * @ORM\Table(name="domain")
 * @ORM\Entity
 */
class Domain
{
    /**
     * @var string
     *
     * @ORM\Column(name="domain_name", type="string", length=255, nullable=false)
     */
    private $domainName;

    /**
     * @var integer
     *
     * @ORM\Column(name="volume", type="integer", nullable=false)
     */
    private $volume;

    /**
     * @var float
     *
     * @ORM\Column(name="spf", type="float", precision=10, scale=0, nullable=false)
     */
    private $spf;

    /**
     * @var float
     *
     * @ORM\Column(name="dkim", type="float", precision=10, scale=0, nullable=false)
     */
    private $dkim;

    /**
     * @var float
     *
     * @ORM\Column(name="dmarc", type="float", precision=10, scale=0, nullable=false)
     */
    private $dmarc;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="created_by", type="integer", nullable=false)
     */
    private $createdBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_datetime", type="datetime", nullable=false)
     */
    private $createdDatetime;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set domainName
     *
     * @param string $domainName
     *
     * @return Domain
     */
    public function setDomainName($domainName)
    {
        $this->domainName = $domainName;

        return $this;
    }

    /**
     * Get domainName
     *
     * @return string
     */
    public function getDomainName()
    {
        return $this->domainName;
    }

    /**
     * Set volume
     *
     * @param integer $volume
     *
     * @return Domain
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;

        return $this;
    }

    /**
     * Get volume
     *
     * @return integer
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * Set spf
     *
     * @param float $spf
     *
     * @return Domain
     */
    public function setSpf($spf)
    {
        $this->spf = $spf;

        return $this;
    }

    /**
     * Get spf
     *
     * @return float
     */
    public function getSpf()
    {
        return $this->spf;
    }

    /**
     * Set dkim
     *
     * @param float $dkim
     *
     * @return Domain
     */
    public function setDkim($dkim)
    {
        $this->dkim = $dkim;

        return $this;
    }

    /**
     * Get dkim
     *
     * @return float
     */
    public function getDkim()
    {
        return $this->dkim;
    }

    /**
     * Set dmarc
     *
     * @param float $dmarc
     *
     * @return Domain
     */
    public function setDmarc($dmarc)
    {
        $this->dmarc = $dmarc;

        return $this;
    }

    /**
     * Get dmarc
     *
     * @return float
     */
    public function getDmarc()
    {
        return $this->dmarc;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return Domain
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set createdBy
     *
     * @param integer $createdBy
     *
     * @return Domain
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return integer
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set createdDatetime
     *
     * @param \DateTime $createdDatetime
     *
     * @return Domain
     */
    public function setCreatedDatetime($createdDatetime)
    {
        $this->createdDatetime = $createdDatetime;

        return $this;
    }

    /**
     * Get createdDatetime
     *
     * @return \DateTime
     */
    public function getCreatedDatetime()
    {
        return $this->createdDatetime;
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
