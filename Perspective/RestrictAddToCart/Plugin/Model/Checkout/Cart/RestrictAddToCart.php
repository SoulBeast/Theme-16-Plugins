<?php

namespace Perspective\RestrictAddToCart\Plugin\Model\Checkout\Cart;

use Magento\Framework\Exception\LocalizedException;

class RestrictAddToCart
{
    // --- --- Ограничили покупку товаров ниже 50$ --- --- //

    /* public function beforeAddProduct($subject, $productInfo, $requestInfo = null)
    {
        try {

            $productId = $productInfo->getId();

        #if ($productId == 1) { 
        #    throw new LocalizedException(__('Could not add Product to Cart')); 
        #} 

        if ($productInfo->getFinalPrice() < 50) {
            throw new LocalizedException(__('Could not add Product to Cart'));
        }

        } catch (\Exception $e) {
            throw new LocalizedException(__($e->getMessage()));
        }

        return [$productInfo, $requestInfo];
    } */ 
    
    // --- --- ----------------------------------- --- --- //

    // --- --- Можно класть в Корзину только более 2-х шт каждого товара --- --- //
    public function beforeAddProduct(\Magento\Checkout\Model\Cart $subject, $productInfo, $requestInfo = null)
    {

        try {

            $qty = $requestInfo['qty'];

            if ($qty < 3) {

                throw new LocalizedException(__('Could not add Product to Cart'));
            }
        } catch (\Exception $e) {
            throw new LocalizedException(__($e->getMessage()));
        }

        return [$productInfo, $requestInfo];
    }
    // --- --- --------------------------------------------------------- --- --- //
}
