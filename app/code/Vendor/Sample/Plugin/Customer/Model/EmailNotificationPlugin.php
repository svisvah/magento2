<?php

namespace Vendor\Sample\Plugin\Customer\Model;

use Magento\Customer\Model\Customer;
use Magento\Customer\Api\CustomerRepositoryInterface;

class EmailNotificationPlugin
{
    /**
     * @var Customer
     */
    private $customer;

    /**
     * EmailNotification constructor.
     *
     * @param Customer $customer
     */
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function aroundNewAccount(
        \Magento\Customer\Model\EmailNotification $subject,
        \Closure $proceed
    ) {
        $customAttributeValue = $this->customer->getCustomAttribute('want_to_become_wholesale_customer')
            ? $this->customer->getCustomAttribute('want_to_become_wholesale_customer')->getValue()
            : null;

        if ($customAttributeValue == 1) {
            // Skip sending the new account email if the custom attribute is set to 1
            return $subject;
        }

        // Proceed with the original method logic if the custom attribute is not set or is not equal to 1
        $result = $proceed();

        // Your custom logic to send the additional email on registration success
       
        return $result;
    }
}