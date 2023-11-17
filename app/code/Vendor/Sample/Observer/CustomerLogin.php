<?php

namespace Vendor\Sample\Observer;

use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\App\Response\Http;

class CustomerLogin implements ObserverInterface
{
    protected $logger;
    protected $customerSession;
    protected $messageManager;
    protected $response;

    public function __construct(
        LoggerInterface $logger,
        \Magento\Customer\Model\Session $customerSession,
        ManagerInterface $messageManager,
        Http $response
    ) {
        $this->logger = $logger;
        $this->customerSession = $customerSession;
        $this->messageManager = $messageManager;
        $this->response = $response;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        //$customer = $this->customerSession->getCustomer();
        
        $event = $observer->getEvent();
        $customer = $event->getCustomer();

        // Get the value of the custom attribute
        $wholesaleValue = $customer->getData('want_to_become_wholesale_customer');

        $approveValue=$customer->getData('approve_as_wholesale_customer');
        $approve=($approveValue?'Yes':'No');
        // Store the value in a variable
        $customAttributeValue = ($wholesaleValue ? 'Yes' : 'No');

        $this->logger->info("Customer Logged In");

        if ($customAttributeValue === 'Yes') {
            if($approve == 'No')
            {
            $this->messageManager->addErrorMessage(__('Admin approval is required to become a wholesale customer.'));
            $this->customerSession->logout(); // Log out the user
            }
            else
            {
                $this->logger->info("Logging as wholesale customer: " . $customer->getName());

            }
        } else {
            $this->logger->info("Customer Name: " . $customer->getName());
        }
    }
}
