<?php
namespace Perspective\Theme16ChangeOnlyXLeftThreshold\Plugin;
use \Magento\CatalogInventory\Block\Stockqty\AbstractStockqty;
use \Magento\Catalog\Model\Product;
class ChangeOnlyXLeftThreshold
{
    private $AbstractStockqty;
    private $_Product;

    /**
     * @var \Magento\Framework\Registry
     */
    private $_registry;

    public function __construct(
        AbstractStockqty $AbstractStockqty,
        Product $Product,
        \Magento\Framework\Registry $registry)
   {
        $this->AbstractStockqty = $AbstractStockqty;
        $this->_Product = $Product;
        $this->_registry = $registry;
    }

    public function test()
    {
        return $this->AbstractStockqty->getStockQtyLeft();
    }

    public function beforeGetStockQtyLeft(\Magento\CatalogInventory\Block\Stockqty\AbstractStockqty $subject, $result)
    {
        return $result / 2;
    }

/*     private function _getSalableQuantity(Product $subject)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $StockState = $objectManager->get('\Magento\InventorySalesAdminUi\Model\GetSalableQuantityDataBySku');
        $qty = $StockState->execute($this->_Product->getSku());
        return $this->_Product->getId();
    } */

/*     private function _getProduct()
    {
        return $this->_registry->registry('current_product');
    }

    public function afterGetName(\Magento\Catalog\Model\Product $subject, $result)
    {
        #$subject = $subject->setQty(20);
        #$tempQty = $subject->getQty();
        return $this->test() . " " . $result;
    } */
}