<?php

namespace Vendor\Sample\Observer;

use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\App\Response\Http;

class ChangeGroup implements ObserverInterface
{
    const CUSTOMER_GROUP_ID = 2;

    protected $_customerRepositoryInterface;
    protected $logger;
    protected $messageManager;
    protected $response;

    public function __construct(
        LoggerInterface $logger,
        ManagerInterface $messageManager,
        Http $response
    ) {
        $this->logger = $logger;
        $this->messageManager = $messageManager;
        $this->response = $response;
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer();
      
        // $wholesaleValue = $customer->getData('want_to_become_wholesale_customer');

        // $approveValue=$customer->getData('approve_as_wholesale_customer');
        // $approve=($approveValue?'Yes':'No');
        // // Store the value in a variable
        // $customAttributeValue = ($wholesaleValue ? 'Yes' : 'No');

        // echo  $customAttributeValue;
        // echo $approve // GET customer object
        $wholesale=$customer->getCustomAttribute('want_to_become_wholesale_customer')->getValue();
        $approve=$customer->getCustomAttribute('want_to_become_wholesale_customer')->getValue();
        $notify=$customer->getCustomAttribute('notify_customer')->getValue();

        // echo "Wholesale". $wholesale;
        // echo "Approve".$approve;
        //  exit();
        $groupid=$customer->getGroupId();
        if ($wholesale==1 && $approve==1 && $groupid==1) {
            $customer->setGroupId(self::CUSTOMER_GROUP_ID);
            //$customer->save();
            $this->logger->info("Being as wholesale ustomer group: ");
        }
        else
        {
            $this->logger->info("Being as general customer group: ");

        }
        if($wholesale==1 && $approve==1 && $groupid==2 )
        {
                if ($notify == 0) {
                    // Set notify value to 1
                    $notify = $customer->setCustomAttribute(1);
                }
                else {
                    // Notify value is already 1, throw success message
                    $this->messageManager->addSuccessMessage(__('Email is already sent to the customer.'));
                }

        }
        
    }
}
