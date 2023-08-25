<?php

namespace Perspective\Theme15Ex2Social\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Framework\View\Element\Template\Context;
use Perspective\Theme15Ex2Social\Helper\Data;

class Config implements ArgumentInterface
{
    /**
     * @var Data
     */
    protected $helper;

    /**
     * @var \Magento\Framework\Registry
     */
    private $_registry;

    /**
     * @var \Magento\CatalogInventory\Model\Stock\StockItemRepository
     */
    private $_stockItemRepository;

    /**
     * @var \Magento\Directory\Model\CurrencyFactory
     */
    private $_currencyFactory;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    private $_storeManager;

    public function __construct(
        Context $context,
        Data $helper,
        \Magento\Framework\Registry $registry,
        \Magento\CatalogInventory\Model\Stock\StockItemRepository $stockItemRepository,
        \Magento\Directory\Model\CurrencyFactory $currencyFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
        $this->helper = $helper;
        $this->_registry = $registry;
        $this->_stockItemRepository = $stockItemRepository;
        $this->_currencyFactory = $currencyFactory;
        $this->_storeManager = $storeManager;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->helper->isEnabled();
    }

    //### ### Get info ### ###//

    public function getSocialDiscount()
    {
        return $this->helper->getSocialDiscount();
    }

    //### ### CurrentProduct ### ###//

    public function getCurrentProduct()
    {
        return $this->_registry->registry('current_product');
    }

    public function getCurrentCategory()
    {
        return $this->_registry->registry('current_category');
    }

    public function getStockItem($productId)
    {
        return $this->_stockItemRepository->get($productId);
    }
}

