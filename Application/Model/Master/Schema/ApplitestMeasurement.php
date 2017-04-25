<?php

namespace Application\Model\Master\Schema;

/**
 * ApplitestMeasurement
 */
class ApplitestMeasurement extends \Sam\Orm\Doctrine\DoctrineEntity
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var float
     */
    private $a;

    /**
     * @var float
     */
    private $b;

    /**
     * @var float
     */
    private $c;

    /**
     * @var float
     */
    private $d;

    /**
     * @var float
     */
    private $e;

    /**
     * @var float
     */
    private $f;

    /**
     * @var float
     */
    private $g;

    /**
     * @var integer
     */
    private $duration;


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
     * Set a
     *
     * @param float $a
     *
     * @return ApplitestMeasurement
     */
    public function setA($a)
    {
        $this->a = $a;

        return $this;
    }

    /**
     * Get a
     *
     * @return float
     */
    public function getA()
    {
        return $this->a;
    }

    /**
     * Set b
     *
     * @param float $b
     *
     * @return ApplitestMeasurement
     */
    public function setB($b)
    {
        $this->b = $b;

        return $this;
    }

    /**
     * Get b
     *
     * @return float
     */
    public function getB()
    {
        return $this->b;
    }

    /**
     * Set c
     *
     * @param float $c
     *
     * @return ApplitestMeasurement
     */
    public function setC($c)
    {
        $this->c = $c;

        return $this;
    }

    /**
     * Get c
     *
     * @return float
     */
    public function getC()
    {
        return $this->c;
    }

    /**
     * Set d
     *
     * @param float $d
     *
     * @return ApplitestMeasurement
     */
    public function setD($d)
    {
        $this->d = $d;

        return $this;
    }

    /**
     * Get d
     *
     * @return float
     */
    public function getD()
    {
        return $this->d;
    }

    /**
     * Set e
     *
     * @param float $e
     *
     * @return ApplitestMeasurement
     */
    public function setE($e)
    {
        $this->e = $e;

        return $this;
    }

    /**
     * Get e
     *
     * @return float
     */
    public function getE()
    {
        return $this->e;
    }

    /**
     * Set f
     *
     * @param float $f
     *
     * @return ApplitestMeasurement
     */
    public function setF($f)
    {
        $this->f = $f;

        return $this;
    }

    /**
     * Get f
     *
     * @return float
     */
    public function getF()
    {
        return $this->f;
    }

    /**
     * Set g
     *
     * @param float $g
     *
     * @return ApplitestMeasurement
     */
    public function setG($g)
    {
        $this->g = $g;

        return $this;
    }

    /**
     * Get g
     *
     * @return float
     */
    public function getG()
    {
        return $this->g;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     *
     * @return ApplitestMeasurement
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer
     */
    public function getDuration()
    {
        return $this->duration;
    }
    /**
     * @var \Application\Model\Master\Schema\ApplitestReport
     */
    private $report;


    /**
     * Set report
     *
     * @param \Application\Model\Master\Schema\ApplitestReport $report
     *
     * @return ApplitestMeasurement
     */
    public function setReport(\Application\Model\Master\Schema\ApplitestReport $report = null)
    {
        $this->report = $report;

        return $this;
    }

    /**
     * Get report
     *
     * @return \Application\Model\Master\Schema\ApplitestReport
     */
    public function getReport()
    {
        return $this->report;
    }
}
