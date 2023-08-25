<?php
namespace Perspective\Theme16ChangeSKU\Plugin;

class ChangeSKU
{
    public function afterGetSku(\Magento\Catalog\Model\Product $subject, $result)
    {
        return "Product ID: " . $subject->getId() . " - " . $result;
    }
}
