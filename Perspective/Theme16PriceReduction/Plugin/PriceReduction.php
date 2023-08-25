<?php

namespace Perspective\Theme16PriceReduction\Plugin;
use Perspective\Theme16PriceReduction\Helper\Data;

class PriceReduction
{
    /**
     * @var Data
     */
    protected $helper;

    public function __construct(
        Data $helper,
    ) {
        $this->helper = $helper;
    }

    /**
     * Get selected options from menu configuration
     */
    public function getProductCategories()
    {
        return $this->helper->getProductCategories();
    }

    /**
     * Getting the discount value
     */
    public function getPriceReductionPercentage()
    {
        return $this->helper->getPriceReductionPercentage();
    }

    /**
     * Transform text form ID into array ID
     */
    private function _getIdArray ()
    {
        $categoryTitle = $this->getProductCategories();
        $categoryTitle = explode(",", $categoryTitle);
        return $categoryTitle;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->helper->isEnabled();
    }

    public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
    {
        foreach ($this->_getIdArray() as $categoryId)
        {
            if ($this->isEnabled() && $subject->getCategoryId() == $categoryId){

                $tempPercent = $this->getPriceReductionPercentage() / 100;
                $Percent = $result * $tempPercent;

                return $result - $Percent;
            }
        }

        return $result;
    }
}
