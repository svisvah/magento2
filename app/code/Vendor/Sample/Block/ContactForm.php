<?php

namespace Vendor\Sample\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\Data\Form\FormKey;

class ContactForm extends Template
{
    protected $directoryBlock;
    protected $formKey;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Directory\Block\Data $directoryBlock,
        FormKey $formKey,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->directoryBlock = $directoryBlock;
        $this->formKey = $formKey;
    }

    public function getCountries()
    {
        $country = $this->directoryBlock->getCountryHtmlSelect();
        return $country;
    }

    public function getRegion()
    {
        $region = $this->directoryBlock->getRegionHtmlSelect();
        return $region;
    }

    public function getCountryAction()
    {
        return $this->getUrl('sample/mypage/country', ['_secure' => true]);
    }

    public function getFormAction()
    {
        return 'mypage/mypage/mycontroller';
        // Update 'mycontroller' and 'action' with your actual controller and action names
    }

    public function getFormKey()
    {
        return $this->formKey->getFormKey();
    }
}
