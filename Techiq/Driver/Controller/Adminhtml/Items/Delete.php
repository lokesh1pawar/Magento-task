<?php


namespace Techiq\Driver\Controller\Adminhtml\Items;

class Delete extends \Techiq\Driver\Controller\Adminhtml\Items
{

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            try {
                $model = $this->_objectManager->create('Techiq\Driver\Model\Events');
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('You deleted the Driver.'));
                $this->_redirect('techiq_driver/*/');
                return;
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addError(
                    __('We can\'t delete driver right now. Please review the log and try again.')
                );
                $this->_objectManager->get('Psr\Log\LoggerInterface')->critical($e);
                $this->_redirect('techiq_driver/*/edit', ['id' => $this->getRequest()->getParam('id')]);
                return;
            }
        }
        $this->messageManager->addError(__('We can\'t find a driver to delete.'));
        $this->_redirect('techiq_driver/*/');
    }
}