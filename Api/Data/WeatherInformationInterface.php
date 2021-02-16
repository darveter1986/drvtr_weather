<?php


namespace Drvtr\Weather\Api\Data;

/**
 * Interface WeatherInformationInterface
 * @api
 */
interface WeatherInformationInterface
{
    const TABLE_NAME = 'drvtr_weather';

    const ID = 'id';
    const NAME = 'name';
    const DESCRIPTION = 'description';
    const TEMP = 'temp';
    const HUMIDITY = 'humidity';
    const WIND_SPEED = 'wind_speed';
    const CREATED_AT = 'created_at';


    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $value
     * @return void
     */
    public function setName($value);

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param string $value
     * @return void
     */
    public function setDescription($value);

    /**
     * @return string
     */
    public function getTemp();

    /**
     * @param string $value
     * @return void
     */
    public function setTemp($value);

    /**
     * @return string
     */
    public function getHumidity();

    /**
     * @param string $value
     * @return void
     */
    public function setHumidity($value);

    /**
     * @return string
     */
    public function getWindSpeed();

    /**
     * @param string $value
     * @return void
     */
    public function setWindSpeed($value);

    /**
     * @return string
     */
    public function getCreatedAt();

}
