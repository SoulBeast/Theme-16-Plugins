<?php
############### Before Listener ###############
    namespace Webkul\Test\Model;
    class Cart
    {
        public function beforeAddProduct(
            \Magento\Checkout\Model\Cart $subject,
            $productInfo,
            $requestInfo = null
        ) {
            $requestInfo['qty'] = 10; // increasing quantity to 10
            return array($productInfo, $requestInfo);
        }
    }
###############################################