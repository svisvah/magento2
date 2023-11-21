<?php
namespace Vendor\Sample\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magento\Customer\Model\Data\Customer;
use Magento\Customer\Api\CustomerRepositoryInterface;

class SendWelcomeEmail implements ObserverInterface
{
    protected $logger;
    protected $storeManager;
    protected $transportBuilder;
    protected $inlineTranslation;
    protected $messageManager;
    protected $customerRepository;

    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Mail\Template\TransportBuilder $transportBuilder,
        \Magento\Framework\Translate\Inline\StateInterface $inlineTranslation,
        \Magento\Framework\Message\ManagerInterface $messageManager,
        CustomerRepositoryInterface $customerRepository
    ) {
        $this->logger = $logger;
        $this->storeManager = $storeManager;
        $this->transportBuilder = $transportBuilder;
        $this->inlineTranslation = $inlineTranslation;
        $this->messageManager = $messageManager;
        $this->customerRepository = $customerRepository;
    }

    public function execute(Observer $observer)
    {
        // Ensure we have a fully loaded customer object
        $customerId = $observer->getEvent()->getCustomer()->getId();
        $customer = $this->customerRepository->getById($customerId);

        // Check if the customer is a wholesale customer, approved, and notify_customer is true
        if ($customer->getGroupId() == 2 && $customer->getCustomAttribute('notify_customer')->getValue() == 1) {
            // Send the welcome email for wholesale customers
            $this->sendWelcomeEmail($customer);
        }
    }

    protected function sendWelcomeEmail(Customer $customer)
    {
        try {
            // Your existing code
            $store = $this->storeManager->getStore();
            $storeId = $store->getId();
            $templateId = 2; // Replace with the actual template ID

            $transport = $this->transportBuilder
                ->setTemplateIdentifier($templateId)
                ->setTemplateOptions(['area' => \Magento\Framework\App\Area::AREA_FRONTEND, 'store' => $storeId])
                ->setTemplateVars([
                    'customer' => $customer,
                    'email' => $customer->getEmail(),
                    'name' => $customer->getFirstname() . ' ' . $customer->getLastname(),
                    'password' => 'Password you set when creating account',

                ])
                ->setFrom(['name' => 'Owner', 'email' => 'vishva.eod@gmail.com'])
                ->addTo($customer->getEmail(), $customer->getFirstname() . ' ' . $customer->getLastname())
                ->getTransport();

            $transport->sendMessage();
            $this->inlineTranslation->resume();
            $this->messageManager->addSuccessMessage(__('Customer Notification email sent successfully.'));

        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            $this->messageManager->addErrorMessage(__('An error occurred while sending the welcome email.'));
        }
    }
}
