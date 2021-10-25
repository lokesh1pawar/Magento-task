<?php


namespace Techiq\Driver\Controller\Adminhtml\Items;

class Edit extends \Techiq\Driver\Controller\Adminhtml\Items
{

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
       
        $model = $this->_objectManager->create('Techiq\Driver\Model\Events');

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This event no longer exists.'));
                $this->_redirect('techiq_driver/*');
                return;
            }
        }
        // set entered data if was error when we do save
        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getPageData(true);
        if (!empty($data)) {
            $model->addData($data);
        }
        $this->_coreRegistry->register('current_techiq_driver_items', $model);
        $this->_initAction();
        if ($model->getId()) {
            $title = __('Edit Driver');
        } else {
            $title = __('New Driver Create Form');
        }
        $this->_view->getPage()->getConfig()->getTitle()->prepend($title);
        $this->_view->getLayout()->getBlock('items_items_edit');
        $this->_view->renderLayout();
    }
}