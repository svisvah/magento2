<?php
namespace Vendor\Sample\Plugin;
use Magento\Customer\Model\EmailNotification as MagentoEmailNotification;
use Magento\Customer\Model\Data\Customer;
class EmailNotification
{
    public function aroundNewAccount(
        MagentoEmailNotification $subject,
        callable $proceed,
        Customer $customer,
        $type = 'registered',
        $backUrl = '',
        $storeId = 0,
        $sendemailStoreId = null
    ) {
        // Check if the customer is a wholesale customer (assuming 'want_to_become_wholesale_customer' is a custom attribute)
        $isWholesaleCustomer = $customer->getCustomAttribute('want_to_become_wholesale_customer')
            ? $customer->getCustomAttribute('want_to_become_wholesale_customer')->getValue() == 1
            : false;
        if ($isWholesaleCustomer) { 
            return $subject;
        } 
        return $proceed($customer, $type, $backUrl, $storeId, $sendemailStoreId);
    }
}
