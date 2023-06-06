<?php
namespace Mageplaza\GiftCard\Controller\Index;
use Magento\Framework\App\Action\Context;

class Add extends \Magento\Framework\App\Action\Action
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
        $data = [
            'code'         => "12343498",
            'balance' => 12.4,
            'amount_used'      => 12.4,
            'create_from'         => 'test',
        ];
        try {
            $post = $this->_postFactory->create();
            $post->addData($data)->save();
            echo 'success!';
        }
        catch (\Exception)
        {
            echo 'Error!';
        }

    }
}
