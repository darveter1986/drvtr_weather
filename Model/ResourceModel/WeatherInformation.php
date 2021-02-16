<?php


namespace Drvtr\Weather\Model\ResourceModel;


use Drvtr\Weather\Api\Data\WeatherInformationInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class WeatherInformation
 */
class WeatherInformation extends AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init(WeatherInformationInterface::TABLE_NAME, WeatherInformationInterface::ID);
    }
}
