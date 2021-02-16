<?php


namespace Drvtr\Weather\Model\ResourceModel\WeatherInformation;


use Drvtr\Weather\Model\ResourceModel\WeatherInformation as WeatherInformationResource;
use Drvtr\Weather\Model\WeatherInformation;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 */
class Collection extends AbstractCollection
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init(WeatherInformation::class, WeatherInformationResource::class);
    }
}
