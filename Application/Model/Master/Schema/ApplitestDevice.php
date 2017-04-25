<?php

namespace Application\Model\Master\Schema;

/**
 * ApplitestDevice
 */
class ApplitestDevice extends \Sam\Orm\Doctrine\DoctrineEntity
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $patientId; // TODO : Pourra, à terme être un objet de type ApplitestPatient

    /**
     * @var \DateTime
     */
    private $startDate;

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
     * Set patientId
     *
     * @param integer $patientId
     *
     * @return ApplitestDevice
     */
    public function setPatientId($patientId)
    {
        $this->patientId = $patientId;

        return $this;
    }

    /**
     * Get patientId
     *
     * @return integer
     */
    public function getPatientId()
    {
        return $this->patientId;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return ApplitestDevice
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }
}
