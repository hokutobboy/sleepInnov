<?php

namespace Application\Controller;


use Application\Model\Master\Schema\ApplitestMeasurement;
use Application\Model\Master\Schema\ApplitestReport;
use Sam\Mvc\Controller\Controller;

class ApplitestController extends Controller {
    /**
     * Détails d'un rapport de DM
     * @param $id
     */
    public function adminReportAction($id){
        /** @var ApplitestReport $report */
        $report = $this->getModelManager()->get('Master/ApplitestReport')->find($id);
        $reportDefaultDuration = $report->getDefaultDuration(); // Je stocke dans une variable locale, afin que ce getter ne soit appelé qu'une seule fois
        $measurementsArray = $this->getMeasurementsSimpleArray($report->getMeasurements()->getValues(), $reportDefaultDuration);

        $this->set('dmSerialNumber',$report->getDevice()->getId());             // Un rapport est forcément lié à un et un seul Device. Un Device a forcément un id. Je considère, pour cet exemple, que l'id du Device correspond à son numéro de série
        $this->set('reportDate',    $report->getCreatedAt()->format('Y-m-d'));  // La propriété createdAt étant non-nulle, et étant forcément un objet Datetime, pas besoin de vérifier son intégrité avant d'appeler la méthode Datetime::format()
        $this->set('reportTime',    $report->getCreatedAt()->format('H:i:s'));
        $this->set('measurements',  $measurementsArray);
    }

    /**
     * @param ApplitestMeasurement[] $measurementsArray
     * @param int $defaultDuration
     * @return array
     */
    private function getMeasurementsSimpleArray($measurementsArray, $defaultDuration){
        $responseArray = array();
        /** @var ApplitestMeasurement $measurement */
        foreach ($measurementsArray as $measurement){
            $responseArray[$measurement->getId()] = $this->getArrayFromMeasurement($measurement, $defaultDuration);
        }
        return $responseArray;
    }

    /**
     * Convertit un objet Measurement en simple tableau associatif
     * @param ApplitestMeasurement $measurement
     * @param int $defaultDuration
     * @return array
     */
    private function getArrayFromMeasurement($measurement, $defaultDuration){
        $measurementDuration = $measurement->getDuration();
        if(empty($measurementDuration) || $measurementDuration >= $defaultDuration){
            $measurementDuration = $defaultDuration;
        }
        $responseArray = array(
            'duration'  => $measurementDuration,
            'a'         => $measurement->getA(),
            'b'         => $measurement->getB(),
            'c'         => $measurement->getC(),
            'd'         => $measurement->getD(),
            'e'         => $measurement->getE(),
            'f'         => $measurement->getF(),
            'g'         => $measurement->getG()
        );
        return $responseArray;
    }
} 
