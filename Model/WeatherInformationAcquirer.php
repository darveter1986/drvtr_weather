<?php


namespace Drvtr\Weather\Model;


use Drvtr\Weather\Api\WeatherInformationAcquirerInterface;
use Drvtr\Weather\Model\ResourceModel\WeatherInformation\Collection;
use Drvtr\Weather\Model\ResourceModel\WeatherInformation\CollectionFactory;

/**
 * Class WeatherInformationAcquirer
 */
class WeatherInformationAcquirer implements WeatherInformationAcquirerInterface
{
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * WeatherInformationAcquirer constructor.
     */
    public function __construct(
        CollectionFactory $collectionFactory
    ) {
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @inheritdoc
     */
    public function getLastRow()
    {
        /** @var Collection $collection */
        $collection = $this->collectionFactory->create();
        return $collection->getLastItem();
    }
}
