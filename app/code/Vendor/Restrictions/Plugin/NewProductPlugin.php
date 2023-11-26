<?php

namespace Vendor\Restrictions\Plugin;

use Magento\Catalog\Block\Product\NewProduct;
use Magento\Catalog\Model\ResourceModel\Product\Collection as ProductCollection;
use Magento\Customer\Model\Session as CustomerSession;

class NewProductPlugin
{
    protected $customerSession;

    public function __construct(
        CustomerSession $customerSession
    ) {
        $this->customerSession = $customerSession;
    }

    public function afterGetProductCollection(NewProduct $subject, $result)
    {
        $customerGroupId = $this->customerSession->getCustomerGroupId();

        // For not-logged-in customers, Magento uses the customer group with ID 0 (NOT LOGGED IN)
        $customerGroupId = ($customerGroupId) ? $customerGroupId : 0;

        // Check customer group and modify the product collection accordingly
        if ($customerGroupId == 2) {
            $result->addAttributeToFilter('wholesale_visibility', ['eq' => 1]); // Show products where wholesale_visibility is "no"
        }
        else
        {
            $result->addAttributeToFilter('wholesale_visibility', ['eq' => 0]);
        }

        return $result;
    }
}
