<?php
namespace Vendor\Sample\Controller\Mypage;
use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;

class MyController extends Action
{
    protected $_fileUploaderFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\File\UploaderFactory $fileUploaderFactory
    ) {
        parent::__construct($context);
        $this->_fileUploaderFactory = $fileUploaderFactory;
    }

    public function execute()
    {
        if ($this->getRequest()->isPost()) {
            try {
                // File Upload
                $uploader = $this->_fileUploaderFactory->create(['fileId' => 'resume']);
                $uploader->setAllowedExtensions(['docx','pdf','doc']);
                $uploader->setFilesDispersion(true);
                $uploader->setAllowRenameFiles(true);

                $targetPath = $this->_objectManager->get('Magento\Framework\Filesystem')
                    ->getDirectoryWrite(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA)
                    ->getAbsolutePath('documents/');

                $uploader->save($targetPath);

                // Save data to the database
                $data = $this->_objectManager->create('Vendor\Sample\Model\Data');
                $data->setData($_POST);

                // Get the uploaded file name and store it in the database
                $uploadedFileName = $uploader->getUploadedFileName();
                $data->setResume('documents/' . $uploadedFileName);

                $data->save();

                $this->messageManager->addSuccessMessage('Submitted Successfully');
                $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
                $resultRedirect->setUrl('/mypage/mypage/newpage');
                return $resultRedirect;
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            }
        }
        
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl('/mypage/mypage/errorpage');
        return $resultRedirect;
    }
}
?>