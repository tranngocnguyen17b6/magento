<?php
namespace Mageplaza\GiftCard\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    protected $_postFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Mageplaza\GiftCard\Model\GiftCardFactory $postFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_postFactory = $postFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $post = $this->_postFactory->create();
        //show 1 phần tử
//        $post->load(1);
//        echo '<pre>';
//        print_r($post->getdata());
//        echo "</pre>";
        //show cả bảng
        $collection = $post->getCollection();
        foreach($collection as $item){
            echo "<pre>";
            print_r($item->getData());
            echo "</pre>";
        }
        //show câu truy van sql
        //echo $collection->getSelect()->__toString();
        exit();
        return $this->_pageFactory->create();
    }
}
