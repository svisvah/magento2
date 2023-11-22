<?php

namespace Magento\Catalog\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Catalog\Model\Product;

class DiscountPrice extends Template
{
    protected $_product;

    public function __construct(
        Context $context,
        Product $product,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_product = $product;
    }

    public function getDiscountPercentage()
    {
        // Your discount calculation logic here
        $price = $this->_product->getFinalPrice();
        $specialPrice = $this->_product->getSpecialPrice();

        if ($specialPrice !== null && $specialPrice < $price) {
            $discount = (($price - $specialPrice) / $price) * 100;
            return round($discount, 2);
        }

        return 0; // No discount
    }
}
