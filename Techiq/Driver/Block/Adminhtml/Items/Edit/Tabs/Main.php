<?php


namespace Techiq\Driver\Block\Adminhtml\Items\Edit\Tabs;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;

class Main extends Generic implements TabInterface
{
    protected $_wysiwygConfig;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory, 
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        array $data = []
    )
    {
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function getTabLabel()
    {
        return __('Drivers Information');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __('Drivers Information');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Prepare form before rendering HTML
     *
     * @return $this
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('current_techiq_driver_items');
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('item_');
       
        $dateFormat = $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT);
        $timeFormat = $this->_localeDate->getTimeFormat(\IntlDateFormatter::SHORT);
       
        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Driver Information')]);
        if ($model->getId()) {
            $fieldset->addField('entity_id', 'hidden', ['name' => 'entity_id']);
        }
        $fieldset->addField(
            'fname',
            'text',
            ['name' => 'fname', 'label' => __('Name'), 'title' => __('Name'), 'required' => true]
        );
        $fieldset->addField(
            'email',
            'text',
            ['name' => 'email', 'label' => __('Email'), 'title' => __('Email'), 'required' => true]
        );
        $fieldset->addField(
            'address',
            'text',
            ['name' => 'address', 'label' => __('Address'), 'title' => __('Address'), 'required' => true]
        );
        $fieldset->addField(
            'phone',
            'text',
            ['name' => 'phone', 'label' => __('Phone'), 'title' => __('Phone'), 'required' => true]
        );
        
       
        $form->setValues($model->getData());
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
