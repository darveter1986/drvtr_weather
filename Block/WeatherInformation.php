<?php


namespace Drvtr\Weather\Block;


use Drvtr\Weather\Model\Config;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

/**
 * Class WeatherInformation
 */
class WeatherInformation extends Template
{
    /**
     * @var Config
     */
    private $config;

    /**
     * WeatherInformation constructor.
     * @param Context $context
     * @param Config $config
     * @param array $data
     */
    public function __construct(
        Context $context,
        Config $config,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->config = $config;
    }

    /**
     * @return bool
     */
    public function isEnable()
    {
        return $this->config->isEnabled();
    }

    /**
     * @return int
     */
    public function getInterval()
    {
        return $this->config->getInterval();
    }
}
