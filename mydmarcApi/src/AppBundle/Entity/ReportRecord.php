<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReportRecord
 *
 * @ORM\Table(name="report_record")
 * @ORM\Entity
 */
class ReportRecord
{
    /**
     * @var integer
     *
     * @ORM\Column(name="report_id", type="integer", nullable=false)
     */
    private $reportId;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=50, nullable=false)
     */
    private $ip;

    /**
     * @var integer
     *
     * @ORM\Column(name="count", type="integer", nullable=false)
     */
    private $count;

    /**
     * @var boolean
     *
     * @ORM\Column(name="disposition", type="boolean", nullable=false)
     */
    private $disposition;

    /**
     * @var boolean
     *
     * @ORM\Column(name="dkim_result", type="boolean", nullable=false)
     */
    private $dkimResult;

    /**
     * @var boolean
     *
     * @ORM\Column(name="spf_result", type="boolean", nullable=false)
     */
    private $spfResult;

    /**
     * @var string
     *
     * @ORM\Column(name="reason", type="string", length=255, nullable=false)
     */
    private $reason;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set reportId
     *
     * @param integer $reportId
     *
     * @return ReportRecord
     */
    public function setReportId($reportId)
    {
        $this->reportId = $reportId;

        return $this;
    }

    /**
     * Get reportId
     *
     * @return integer
     */
    public function getReportId()
    {
        return $this->reportId;
    }

    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return ReportRecord
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set count
     *
     * @param integer $count
     *
     * @return ReportRecord
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Get count
     *
     * @return integer
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Set disposition
     *
     * @param boolean $disposition
     *
     * @return ReportRecord
     */
    public function setDisposition($disposition)
    {
        $this->disposition = $disposition;

        return $this;
    }

    /**
     * Get disposition
     *
     * @return boolean
     */
    public function getDisposition()
    {
        return $this->disposition;
    }

    /**
     * Set dkimResult
     *
     * @param boolean $dkimResult
     *
     * @return ReportRecord
     */
    public function setDkimResult($dkimResult)
    {
        $this->dkimResult = $dkimResult;

        return $this;
    }

    /**
     * Get dkimResult
     *
     * @return boolean
     */
    public function getDkimResult()
    {
        return $this->dkimResult;
    }

    /**
     * Set spfResult
     *
     * @param boolean $spfResult
     *
     * @return ReportRecord
     */
    public function setSpfResult($spfResult)
    {
        $this->spfResult = $spfResult;

        return $this;
    }

    /**
     * Get spfResult
     *
     * @return boolean
     */
    public function getSpfResult()
    {
        return $this->spfResult;
    }

    /**
     * Set reason
     *
     * @param string $reason
     *
     * @return ReportRecord
     */
    public function setReason($reason)
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * Get reason
     *
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
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
     * @var string|null
     */
    private $fromHeader;


    /**
     * Set fromHeader.
     *
     * @param string|null $fromHeader
     *
     * @return ReportRecord
     */
    public function setFromHeader($fromHeader = null)
    {
        $this->fromHeader = $fromHeader;

        return $this;
    }

    /**
     * Get fromHeader.
     *
     * @return string|null
     */
    public function getFromHeader()
    {
        return $this->fromHeader;
    }
}
