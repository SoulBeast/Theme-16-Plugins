<?php
namespace Perspective\Theme16ChangeCurrencyRates\Plugin;

class ChangeCurrencyRates
{
    /**
     * @var \Magento\Directory\Model\CurrencyFactory
     */
    private $_currencyFactory;

    public function __construct(
        \Magento\Directory\Model\CurrencyFactory $currencyFactory
    )
    {
        $this->_currencyFactory = $currencyFactory;
        
    }

    /**
     * Exchange rate conversion
     */
    private function _convertPrice($price)
    {
        $rate = $this->_currencyFactory->create()
            ->load("USD")
            ->getAnyRate("USD");

        $rateTemp = $rate * 0.1;
        $rate = $rateTemp + $rate;
        $convertedPrice = $price * $rate;

        return $convertedPrice;
    }

    public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
    {
        $result = $this->_convertPrice($result);
        return $result;
    }
}
