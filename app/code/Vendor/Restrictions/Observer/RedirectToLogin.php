<?php

namespace Vendor\Restrictions\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\App\Response\Http as ResponseHttp;
use Magento\Framework\UrlInterface;
use Magento\Customer\Model\Session as CustomerSession;

class RedirectToLogin implements ObserverInterface
{
    /**
     * @var ResponseHttp
     */
    protected $response;

    /**
     * @var UrlInterface
     */
    protected $url;

    /**
     * @var CustomerSession
     */
    protected $customerSession;

    /**
     * @param ResponseHttp $response
     * @param UrlInterface $url
     * @param CustomerSession $customerSession
     */
    public function __construct(
        ResponseHttp $response,
        UrlInterface $url,
        CustomerSession $customerSession
    ) {
        $this->response = $response;
        $this->url = $url;
        $this->customerSession = $customerSession;
    }

    /**
     * @param Observer $observer
     * @return $this
     */
    public function execute(Observer $observer)
    {
        if (!$this->customerSession->isLoggedIn()) {
            $this->response->setRedirect($this->url->getUrl('customer/account/login'));
        }

        return $this;
    }
}
