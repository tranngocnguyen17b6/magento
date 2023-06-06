<?php

namespace Mageplaza\GiftCard\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeData implements UpgradeDataInterface
{
    protected $_postFactory;

    public function __construct(\Mageplaza\GiftCard\Model\GiftCardFactory $postFactory)
    {
        $this->_postFactory = $postFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '1.0.4', '<')) {
            $data = [
                'code'         => "1234",
                'balance' => 12.4,
                'amount_used'      => 12.4,
                'create_from'         => 'magento 2,mageplaza helloworld',
            ];
            $post = $this->_postFactory->create();
            $post->addData($data)->save();
        }
    }
}
