<?php

namespace Vendor\Sample\Block;
use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Data\Form\FormKey;
use Magento\Framework\View\Element\Template;
class Custom extends \Magento\Framework\View\Element\Template
{
    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        array $data = []
    )
    {
        parent::__construct($context, $data);
       }

    /**
     * Get form action URL for POST booking request
     *
     * @return string
     */
    public function getFormAction()
    {
        return 'mypage/mypage/mycontroller';
        // here controller_name is index, action is booking
    }
    
}
class BlockName extends Template
{
    protected $formKey;
    public function __construct(Context $context, FormKey $formKey, array $data = [])
    {
        $this->formKey = $formKey;
        parent::__construct($context, $data);
    }
    public function getFormKey()
    { 
        //return $this->formKey->getFormKey();
        return "test";
    }
}