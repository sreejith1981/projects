<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReportResult
 *
 * @ORM\Table(name="report_result")
 * @ORM\Entity
 */
class ReportResult
{
    /**
     * @var integer
     *
     * @ORM\Column(name="report_id", type="integer", nullable=false)
     */
    private $reportId;

    /**
     * @var integer
     *
     * @ORM\Column(name="record_id", type="integer", nullable=false)
     */
    private $recordId;

    /**
     * @var string
     *
     * @ORM\Column(name="domain", type="string", length=255, nullable=false)
     */
    private $domain;

    /**
     * @var integer
     *
     * @ORM\Column(name="dkim_result", type="integer", nullable=false)
     */
    private $dkimResult;

    /**
     * @var string
     *
     * @ORM\Column(name="dkim_selector", type="string", length=20, nullable=false)
     */
    private $dkimSelector;

    /**
     * @var integer
     *
     * @ORM\Column(name="spf_result", type="integer", nullable=false)
     */
    private $spfResult;

    /**
     * @var integer
     *
     * @ORM\Column(name="sequence", type="integer", nullable=false)
     */
    private $sequence;

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
     * @return ReportResult
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
     * Set recordId
     *
     * @param integer $recordId
     *
     * @return ReportResult
     */
    public function setRecordId($recordId)
    {
        $this->recordId = $recordId;

        return $this;
    }

    /**
     * Get recordId
     *
     * @return integer
     */
    public function getRecordId()
    {
        return $this->recordId;
    }

    /**
     * Set domain
     *
     * @param string $domain
     *
     * @return ReportResult
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
     * Set dkimResult
     *
     * @param integer $dkimResult
     *
     * @return ReportResult
     */
    public function setDkimResult($dkimResult)
    {
        $this->dkimResult = $dkimResult;

        return $this;
    }

    /**
     * Get dkimResult
     *
     * @return integer
     */
    public function getDkimResult()
    {
        return $this->dkimResult;
    }

    /**
     * Set dkimSelector
     *
     * @param string $dkimSelector
     *
     * @return ReportResult
     */
    public function setDkimSelector($dkimSelector)
    {
        $this->dkimSelector = $dkimSelector;

        return $this;
    }

    /**
     * Get dkimSelector
     *
     * @return string
     */
    public function getDkimSelector()
    {
        return $this->dkimSelector;
    }

    /**
     * Set spfResult
     *
     * @param integer $spfResult
     *
     * @return ReportResult
     */
    public function setSpfResult($spfResult)
    {
        $this->spfResult = $spfResult;

        return $this;
    }

    /**
     * Get spfResult
     *
     * @return integer
     */
    public function getSpfResult()
    {
        return $this->spfResult;
    }

    /**
     * Set sequence
     *
     * @param integer $sequence
     *
     * @return ReportResult
     */
    public function setSequence($sequence)
    {
        $this->sequence = $sequence;

        return $this;
    }

    /**
     * Get sequence
     *
     * @return integer
     */
    public function getSequence()
    {
        return $this->sequence;
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
