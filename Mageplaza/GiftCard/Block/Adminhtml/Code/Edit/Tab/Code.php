<?php
namespace Mageplaza\GiftCard\Block\Adminhtml\Code\Edit\Tab;

class Code extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface
{


    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Mageplaza\GiftCard\Model\GiftCardFactory  $postFactory,
        array $data = []
    )
    {
        $this->_postFactory = $postFactory;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    protected function _prepareForm()
    {
        $post=$this->_postFactory->create();
        $id=$this->getRequest()->getParam('id');
        if(isset($id))
        {
            $form = $this->_formFactory->create();
            $post->load($id)->getData();
            //dd($post->load($id)->getData());
            $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Gift Card Information')]);
            $fieldset->addField('name', 'text', [
                'name'     => 'code_length',
                'label'    => __('Code Length'),
                'title'    => __('Code Length'),
                'value' => strlen($post->getdata('code'))
            ]);
            $fieldset->addField('balance', 'text', [
                'name'     => 'balance',
                'label'    => __('Balance'),
                'title'    => __('Balance'),
                'required' => true,
                'value' => $post->getdata('balance')
            ]);
            $fieldset->addField('create_from', 'text', [
                'name'     => 'create_from',
                'label'    => __('Create From'),
                'tiatle'    => __('Create From'),
                'value' => $post->getdata('create_from'),
                'readonly'=>true,
            ]);
            $fieldset->addField('giftcard_id', 'hidden', [
                'name'     => 'giftcard_id',
                'label'    => __('giftcard_id'),
                'tiatle'    => __('giftcard_id'),
                'value' => $post->getdata('giftcard_id'),
                'readonly'=>true,
            ]);
        }
        else{
            $form = $this->_formFactory->create();
            $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Gift Card Information')]);
            $fieldset->addField('name', 'text', [
                'name'     => 'code_length',
                'label'    => __('Code Length'),
                'title'    => __('Code Length'),
            ]);
            $fieldset->addField('balance', 'text', [
                'name'     => 'balance',
                'label'    => __('Balance'),
                'title'    => __('Balance'),
                'required' => true
            ]);

        }

        $this->setForm($form);
        return parent::_prepareForm();
    }


    public function getTabLabel()
    {
        return __('Gift card information label');
    }

    public function getTabTitle()
    {
        return $this->getTabLabel();
    }

    public function canShowTab()
    {
        return true;
    }

    public function isHidden()
    {
        return false;
    }
}
