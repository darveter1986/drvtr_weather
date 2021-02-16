<?php


namespace Drvtr\Weather\Model;


use Magento\Framework\HTTP\ZendClientFactory;
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
     * ApiClient constructor.
     * @param Config $config
     * @param JsonSerializer $serializer
     * @param UrlInterface $urlBuilder
     */
    public function __construct(
        Config $config,
        JsonSerializer $serializer,
        UrlInterface $urlBuilder
    ) {
        $this->config = $config;
        $this->serializer = $serializer;
        $this->urlBuilder = $urlBuilder;
    }

    /**
     * @return []
     */
    public function getInfo()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->buildUri());
        curl_setopt($ch, CURLOPT_TIMEOUT,2); // Set timeout to 2s
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
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
        return $apiUrl .= '?' . http_build_query($params);
    }
}
