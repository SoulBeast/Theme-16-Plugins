<?php

namespace Magemonkeys\Changeprice\Plugin;

class ChangeProductPrice
{
    public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
    {

        /* Put your logic here and return the $result */

        return $result + 10;
    }
}
