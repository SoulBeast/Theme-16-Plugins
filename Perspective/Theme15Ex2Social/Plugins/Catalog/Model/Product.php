<?php

namespace Perspective\Theme15Ex2Social\Plugins\Catalog\Model;
use Perspective\Theme15Ex2Social\Helper\Data;
class Product
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
     * @return bool
     */
    public function isEnabled()
    {
        return $this->helper->isEnabled();
    }

    public function afterGetName(\Magento\Catalog\Model\Product $product, $name)
    {
        if ($this->isEnabled() && $product->getData('social_attribute')) :
            return $name . " - SOCIAL!!!";
        endif;

            return $name;
    }
}
