<?php
namespace Nuutti\CartLogger\Controller\Adminhtml\Index;
class Index extends \Magento\Backend\App\Action
{

    const ADMIN_RESOURCE = 'Nuutti_CartLogger::nuutti_cartlogger_menu';

    protected $resultPageFactory;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Nuutti_CartLogger::nuutti_cartlogger_menu');
        $resultPage->getConfig()->getTitle()->prepend(__('Cart Logger'));
        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Nuutti_CartLogger::nuutti_cartlogger_menu');
    }
}

