<?php
namespace Mageplaza\GiftCard\Controller\Adminhtml\Code;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Mageplaza\GiftCard\Model\GiftCard;
class Save extends Action
{
    protected $giftCard;

    public function __construct(
        Context  $context,
        GiftCard $giftCard,
        \Mageplaza\GiftCard\Model\GiftCardFactory  $postFactory
    )
    {
        parent::__construct($context);
        $this->giftCard = $giftCard;
        $this->_postFactory = $postFactory;
    }

    public function execute()
    {
        $postData = $this->getRequest()->getPostValue();
        //dd($postData);
        if(isset($postData['code_length']) && empty($postData['code_length'])==false)
        {
            //random code
            $charaters='ABCDEFGHIJKLMNOPQRSTUVWXYZ2345678901';
            $randomString ="";
            for ($i=0; $i<$postData['code_length']; $i++)
            {
                $randomString.= $charaters[rand(0,strlen($charaters))];
            }
            $postData['code']=$randomString;
            if(isset($postData['giftcard_id'])==true)
            {
                $post=$this->_postFactory->create();
                $giftCard = $this->giftCard->load($postData['giftcard_id']);
                $giftCard->setCode($postData['code']);
                $giftCard->setBalance($postData['balance']);
            }
            try {
                $this->giftCard->setData($postData)->save();
                $this->messageManager->addSuccessMessage(__('The data has been saved.'));
                $this->_redirect('*/*/');
                return;
            }
            catch (\Exception $e) {
                echo $e->getMessage();
                //$this->_redirect('*/*/new');
            }
        }
        else
        {
            echo"no code length";
            $this->_redirect('*/*/new');
        }

    }
}
