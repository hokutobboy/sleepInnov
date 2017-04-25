<?php

namespace Application\Model\Master\Schema;

/**
 * ApplitestReport
 */
class ApplitestReport extends \Sam\Orm\Doctrine\DoctrineEntity
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $defaultDuration;

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
     * Set defaultDuration
     *
     * @param integer $defaultDuration
     *
     * @return ApplitestReport
     */
    public function setDefaultDuration($defaultDuration)
    {
        $this->defaultDuration = $defaultDuration;

        return $this;
    }

    /**
     * Get defaultDuration
     *
     * @return integer
     */
    public function getDefaultDuration()
    {
        return $this->defaultDuration;
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $measurements;

    /**
     * @var \Application\Model\Master\Schema\ApplitestDevice
     */
    private $device;


    /**
     * Add measurement
     *
     * @param \Application\Model\Master\Schema\ApplitestMeasurement $measurement
     *
     * @return ApplitestReport
     */
    public function addMeasurement(\Application\Model\Master\Schema\ApplitestMeasurement $measurement)
    {
        $this->measurements[] = $measurement;

        return $this;
    }

    /**
     * Remove measurement
     *
     * @param \Application\Model\Master\Schema\ApplitestMeasurement $measurement
     */
    public function removeMeasurement(\Application\Model\Master\Schema\ApplitestMeasurement $measurement)
    {
        $this->measurements->removeElement($measurement);
    }

    /**
     * Get measurements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMeasurements()
    {
        return $this->measurements;
    }

    /**
     * Set device
     *
     * @param \Application\Model\Master\Schema\ApplitestDevice $device
     *
     * @return ApplitestReport
     */
    public function setDevice(\Application\Model\Master\Schema\ApplitestDevice $device = null)
    {
        $this->device = $device;

        return $this;
    }

    /**
     * Get device
     *
     * @return \Application\Model\Master\Schema\ApplitestDevice
     */
    public function getDevice()
    {
        return $this->device;
    }
    /**
     * @var \DateTime
     */
    private $createdAt;


    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return ApplitestReport
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}
