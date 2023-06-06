<?php
namespace Mageplaza\GiftCard\Controller\Index;
use Magento\Framework\App\Action\Context;

class Edit extends \Magento\Framework\App\Action\Action
{
    protected $_postFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context      $context,
        \Mageplaza\GiftCard\Model\GiftCardFactory  $postFactory
    )
    {
        $this->_postFactory = $postFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $post=$this->_postFactory->create();

        try {
            $post->load(1);
            if($post->getData('giftcard_id'))
            {
                //$post->setData('create_from','edit1',)->save();
                //cách 2 dùng set+tên cột muốn đổi
                $post->setCode('set')->save();
               // echo $post->getCode();
                echo 'success!';
        }
            else
            {
                echo ' this record is not exsist';
            }
        }
        catch (\Exception)
        {
            echo 'Error!';
        }

    }
}
