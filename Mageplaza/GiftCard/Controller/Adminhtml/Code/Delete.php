<?php
namespace Mageplaza\GiftCard\Controller\Adminhtml\Code;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Ui\Component\MassAction\Filter;
use Mageplaza\GiftCard\Model\ResourceModel\GiftCard\CollectionFactory;

class Delete extends \Magento\Framework\App\Action\Action
{
    protected $filter;
    protected $_postFactory;
    protected $collectionFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context      $context,
        \Mageplaza\GiftCard\Model\GiftCardFactory  $postFactory,
        Filter $filter, CollectionFactory $collectionFactory
    )
    {
        $this->_postFactory = $postFactory;
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $collectionSize = $collection->getSize();
        foreach ($collection as $item) {
            $item->delete();
        }

        $this->messageManager->addSuccess(__('A total of %1 record(s) have been deleted.', $collectionSize));

        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('*/*/');
    }
}
