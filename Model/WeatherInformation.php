<?php


namespace Drvtr\Weather\Model;


use Drvtr\Weather\Api\Data\WeatherInformationInterface;
use Drvtr\Weather\Model\ResourceModel\WeatherInformation as WeatherInformationResource;
use Magento\Framework\Model\AbstractModel;

/**
 * Class WeatherInformation
 * @api
 */
class WeatherInformation extends AbstractModel implements WeatherInformationInterface
{
    /**
     * @inheritdoc
     */
    public function _construct()
    {
        $this->_init(WeatherInformationResource::class);
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return $this->_getData(self::NAME);
    }

    /**
     * @inheritdoc
     */
    public function setName($value)
    {
        $this->setData(self::NAME, $value);
    }

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return $this->_getData(self::DESCRIPTION);
    }

    /**
     * @inheritdoc
     */
    public function setDescription($value)
    {
        $this->setData(self::DESCRIPTION, $value);
    }

    /**
     * @inheritdoc
     */
    public function getTemp()
    {
        return $this->_getData(self::TEMP);
    }

    /**
     * @inheritdoc
     */
    public function setTemp($value)
    {
        $this->setData(self::TEMP, $value);
    }

    /**
     * @inheritdoc
     */
    public function getHumidity()
    {
        return $this->_getData(self::HUMIDITY);
    }

    /**
     * @inheritdoc
     */
    public function setHumidity($value)
    {
        $this->setData(self::HUMIDITY, $value);
    }

    /**
     * @inheritdoc
     */
    public function getWindSpeed()
    {
        return $this->_getData(self::WIND_SPEED);
    }

    /**
     * @inheritdoc
     */
    public function setWindSpeed($value)
    {
        $this->setData(self::WIND_SPEED, $value);
    }

    /**
     * @inheritdoc
     */
    public function getCreatedAt()
    {
        return $this->_getData(self::CREATED_AT);
    }
}
