<?php
namespace Vendor\Sample\Plugin;
class AccountCreation
{
    public function beforeSaveCustomer(
        \Magento\Customer\Model\AccountCreation $subject,
        $customer,
        $password =null,
        $redirectUrl = ''
    ) {
        // Retrieve the custom attributes
        $customAttribute1 = $customer->getCustomAttribute('contact_number');
        $customAttribute2 = $customer->getCustomAttribute('want_to_become_wholesale_customer
        ');

        // Check and set the first custom attribute
        if ($customAttribute1) {
            $customer->setData('want_to_become_wholesale_customer', $customAttribute1->getValue());
        }

        // Check and set the second custom attribute
        if ($customAttribute2) {
            $customer->setData('custom_attribute2', $customAttribute2->getValue());
        }

        return [$customer, $password, $redirectUrl];
    }
}
