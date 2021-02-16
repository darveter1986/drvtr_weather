<?php


namespace Drvtr\Weather\Api;

use Drvtr\Weather\Api\Data\WeatherInformationInterface;

/**
 * Interface WeatherInformationAcquirerInterface
 * @api
 */
interface WeatherInformationAcquirerInterface
{
    /**
     * @return WeatherInformationInterface
     */
    public function getLastRow();
}
