<?php
namespace Mageplaza\GiftCard\Controller\Adminhtml\Code;

class AddNew extends \Magento\Backend\App\Action
{
    protected $_resultForwardFactory = false;
    protected $resultPageFactory;
    public function __construct
    (
        \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory,
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->_resultForwardFactory = $resultForwardFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }
}

