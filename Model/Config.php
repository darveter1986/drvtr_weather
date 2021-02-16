<?php


namespace Drvtr\Weather\Model;


use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Encryption\EncryptorInterface;

/**
 * Class Config
 */
class Config
{
    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @var EncryptorInterface
     */
    private $encryptor;

    /**
     * Constructor
     *
     * @param ScopeConfigInterface $scopeConfig
     * @param EncryptorInterface $encryptor
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        EncryptorInterface $encryptor
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->encryptor = $encryptor;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->scopeConfig->isSetFlag('drvtr_weather/general/enable');
    }

    /**
     * Returns configured API key
     *
     * @return string
     */
    public function getApiKey()
    {
//        return $this->encryptor->decrypt($this->scopeConfig->getValue('drvtr_weather/general/api_key'));
        return $this->scopeConfig->getValue('drvtr_weather/general/api_key');
    }

    /**
     * Returns configured URL for API
     *
     * @return string
     */
    public function getApiUrl()
    {
        return (string)$this->scopeConfig->getValue('drvtr_weather/general/api_url');
    }

    /**
     * Returns configured City name, state code and country code divided by comma, use ISO 3166 country codes.
     *
     * @return string
     */
    public function getApiQuery()
    {
        return (string)$this->scopeConfig->getValue('drvtr_weather/general/api_query');
    }

    /**
     * Units of measurement.
     *
     * @return string
     */
    public function getUnits()
    {
        return (string)$this->scopeConfig->getValue('drvtr_weather/general/units');
    }

    /**
     * Units of measurement.
     *
     * @return int
     */
    public function getInterval()
    {
        return (int)$this->scopeConfig->getValue('drvtr_weather/general/interval');
    }
}
