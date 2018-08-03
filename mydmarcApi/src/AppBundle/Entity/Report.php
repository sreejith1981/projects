<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Report
 *
 * @ORM\Table(name="report")
 * @ORM\Entity
 */
class Report
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_begin", type="datetime", nullable=false)
     */
    private $dateBegin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_end", type="datetime", nullable=false)
     */
    private $dateEnd;

    /**
     * @var string
     *
     * @ORM\Column(name="domain", type="string", length=255, nullable=false)
     */
    private $domain;

    /**
     * @var string
     *
     * @ORM\Column(name="org", type="string", length=255, nullable=false)
     */
    private $org;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="entry_datetime", type="datetime", nullable=false)
     */
    private $entryDatetime;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set dateBegin
     *
     * @param \DateTime $dateBegin
     *
     * @return Report
     */
    public function setDateBegin($dateBegin)
    {
        $this->dateBegin = $dateBegin;

        return $this;
    }

    /**
     * Get dateBegin
     *
     * @return \DateTime
     */
    public function getDateBegin()
    {
        return $this->dateBegin;
    }

    /**
     * Set dateEnd
     *
     * @param \DateTime $dateEnd
     *
     * @return Report
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    /**
     * Get dateEnd
     *
     * @return \DateTime
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * Set domain
     *
     * @param string $domain
     *
     * @return Report
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * Get domain
     *
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Set org
     *
     * @param string $org
     *
     * @return Report
     */
    public function setOrg($org)
    {
        $this->org = $org;

        return $this;
    }

    /**
     * Get org
     *
     * @return string
     */
    public function getOrg()
    {
        return $this->org;
    }

    /**
     * Set entryDatetime
     *
     * @param \DateTime $entryDatetime
     *
     * @return Report
     */
    public function setEntryDatetime($entryDatetime)
    {
        $this->entryDatetime = $entryDatetime;

        return $this;
    }

    /**
     * Get entryDatetime
     *
     * @return \DateTime
     */
    public function getEntryDatetime()
    {
        return $this->entryDatetime;
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
    /**
     * @var string
     */
    private $reportId;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $extraContactInfo;

    /**
     * @var bool
     */
    private $adkim;

    /**
     * @var bool
     */
    private $aspf;

    /**
     * @var int
     */
    private $policy;

    /**
     * @var int
     */
    private $subdomainPolicy;

    /**
     * @var int
     */
    private $percentage;


    /**
     * Set reportId.
     *
     * @param string $reportId
     *
     * @return Report
     */
    public function setReportId($reportId)
    {
        $this->reportId = $reportId;

        return $this;
    }

    /**
     * Get reportId.
     *
     * @return string
     */
    public function getReportId()
    {
        return $this->reportId;
    }

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return Report
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set extraContactInfo.
     *
     * @param string $extraContactInfo
     *
     * @return Report
     */
    public function setExtraContactInfo($extraContactInfo)
    {
        $this->extraContactInfo = $extraContactInfo;

        return $this;
    }

    /**
     * Get extraContactInfo.
     *
     * @return string
     */
    public function getExtraContactInfo()
    {
        return $this->extraContactInfo;
    }

    /**
     * Set adkim.
     *
     * @param bool $adkim
     *
     * @return Report
     */
    public function setAdkim($adkim)
    {
        $this->adkim = $adkim;

        return $this;
    }

    /**
     * Get adkim.
     *
     * @return bool
     */
    public function getAdkim()
    {
        return $this->adkim;
    }

    /**
     * Set aspf.
     *
     * @param bool $aspf
     *
     * @return Report
     */
    public function setAspf($aspf)
    {
        $this->aspf = $aspf;

        return $this;
    }

    /**
     * Get aspf.
     *
     * @return bool
     */
    public function getAspf()
    {
        return $this->aspf;
    }

    /**
     * Set policy.
     *
     * @param int $policy
     *
     * @return Report
     */
    public function setPolicy($policy)
    {
        $this->policy = $policy;

        return $this;
    }

    /**
     * Get policy.
     *
     * @return int
     */
    public function getPolicy()
    {
        return $this->policy;
    }

    /**
     * Set subdomainPolicy.
     *
     * @param int $subdomainPolicy
     *
     * @return Report
     */
    public function setSubdomainPolicy($subdomainPolicy)
    {
        $this->subdomainPolicy = $subdomainPolicy;

        return $this;
    }

    /**
     * Get subdomainPolicy.
     *
     * @return int
     */
    public function getSubdomainPolicy()
    {
        return $this->subdomainPolicy;
    }

    /**
     * Set percentage.
     *
     * @param int $percentage
     *
     * @return Report
     */
    public function setPercentage($percentage)
    {
        $this->percentage = $percentage;

        return $this;
    }

    /**
     * Get percentage.
     *
     * @return int
     */
    public function getPercentage()
    {
        return $this->percentage;
    }
}
