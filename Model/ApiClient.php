<?php


namespace Drvtr\Weather\Model;


use Magento\Framework\HTTP\Client\Curl;
use Magento\Framework\HTTP\Client\CurlFactory;
use Magento\Framework\Serialize\Serializer\Json as JsonSerializer;
use Magento\Framework\UrlInterface;

/**
 * Class ApiClient
 */
class ApiClient
{
    /**
     * @var UrlInterface
     */
    private $urlBuilder;

    /**
     * @var Config
     */
    private $config;

    /**
     * @var JsonSerializer
     */
    private $serializer;

    /**
     * @var CurlFactory
     */
    private $curlFactory;


    /**
     * ApiClient constructor.
     * @param Config $config
     * @param JsonSerializer $serializer
     * @param UrlInterface $urlBuilder
     */
    public function __construct(
        CurlFactory $curlFactory,
        Config $config,
        JsonSerializer $serializer,
        UrlInterface $urlBuilder
    ) {
        $this->config = $config;
        $this->serializer = $serializer;
        $this->urlBuilder = $urlBuilder;
        $this->curlFactory = $curlFactory;
    }

    /**
     * @return []
     */
    public function getInfo()
    {
        /** @var Curl $curlClient */
        $curlClient = $this->curlFactory->create();
        $curlClient->get($this->buildUri());
        $response = $curlClient->getBody();

        return $this->serializer->unserialize($response);
    }

    /**
     * @return string
     */
    private function buildUri()
    {
        $apiUrl = $this->config->getApiUrl();
        $params = [
            'q' => $this->config->getApiQuery(),
            'appid' => $this->config->getApiKey(),
            'units' => $this->config->getUnits(),
        ];
        return $apiUrl . '?' . http_build_query($params);
    }
}
