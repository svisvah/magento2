<?php
namespace Vendor\Sample\Controller\Mypage;

use Magento\Framework\Controller\ResultFactory;

use Magento\Framework\App\Action\Action;

class MyController extends Action
{
    public function __construct(
        \Magento\Framework\App\Action\Context $context
    ) {
        parent::__construct($context);
    }
    public function execute()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $data = $objectManager->create('Vendor\Sample\Model\Data');
        $data->setData($_POST);
        $data->save();
        $this->messageManager->addSuccessMessage('Submitted Sucessfully');
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);

        $resultRedirect->setUrl('newpage');

        return $resultRedirect;
    }
}
