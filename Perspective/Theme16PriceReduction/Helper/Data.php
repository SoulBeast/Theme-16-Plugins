<?php
namespace Perspective\Theme16PriceReduction\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Data extends AbstractHelper
{

    /**
     * @param Context $context
     */

    public function __construct(Context $context)
    {        
        parent::__construct($context);
    }

    public function isEnabled($scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT)
    {
        return $this->scopeConfig->isSetFlag(
            'perspective/general/enable',
            $scope
        );
    }

    // --- --- Get info --- --- //

    public function getProductCategories($scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT)
    {
        return $this->scopeConfig->getValue(
            'perspective/general/product_categories',
            $scope
        );
    }

    public function getPriceReductionPercentage($scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT)
    {
        return $this->scopeConfig->getValue(
            'perspective/general/price_reduction_percentage',
            $scope
        );
    }
    // --- --- -------- --- --- //
}
