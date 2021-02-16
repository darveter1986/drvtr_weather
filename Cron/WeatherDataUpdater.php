<?php


namespace Drvtr\Weather\Cron;


use Drvtr\Weather\Api\Data\WeatherInformationInterface;
use Drvtr\Weather\Api\Data\WeatherInformationInterfaceFactory;
use Drvtr\Weather\Model\ApiClient;
use Drvtr\Weather\Model\Config;
use Drvtr\Weather\Model\ResourceModel\WeatherInformation;
use Magento\Framework\Model\AbstractModel;
use Psr\Log\LoggerInterface;

/**
 * Class WeatherDataUpdater
 */
class WeatherDataUpdater
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @var ApiClient
     */
    private $apiClient;

    /**
     * @var WeatherInformation
     */
    private $resource;

    /**
     * @var WeatherInformationInterfaceFactory
     */
    private $weatherInformationFactory;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * WeatherDataUpdater constructor.
     * @param Config $config
     * @param ApiClient $apiClient
     * @param WeatherInformation $resource
     * @param WeatherInformationInterfaceFactory $weatherInformationFactory
     * @param LoggerInterface $logger
     */
    public function __construct(
        Config $config,
        ApiClient $apiClient,
        WeatherInformation $resource,
        WeatherInformationInterfaceFactory $weatherInformationFactory,
        LoggerInterface $logger
    ) {

        $this->config = $config;
        $this->apiClient = $apiClient;
        $this->resource = $resource;
        $this->weatherInformationFactory = $weatherInformationFactory;
        $this->logger = $logger;
    }

    /**
     * @return void
     */
    public function update()
    {
        if (!$this->config->isEnabled()) {
            return;
        }
        try {
            $info = $this->apiClient->getInfo();
            $data = [
                WeatherInformationInterface::NAME => $info['name'] ?? '',
                WeatherInformationInterface::DESCRIPTION => $info['weather'][0]['description'] ?? '',
                WeatherInformationInterface::TEMP => $info['main']['temp'] ?? '',
                WeatherInformationInterface::HUMIDITY => $info['main']['humidity'] ?? '',
                WeatherInformationInterface::WIND_SPEED => $info['wind']['speed'] ?? '',
            ];

            /** @var WeatherInformationInterface|AbstractModel $weatherInformation */
            $weatherInformation = $this->weatherInformationFactory->create();
            $weatherInformation->setData($data);
            $this->resource->save($weatherInformation);
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
        }
    }
}
