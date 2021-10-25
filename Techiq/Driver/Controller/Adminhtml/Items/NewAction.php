<?php


namespace Techiq\Driver\Controller\Adminhtml\Items;

class NewAction extends \Techiq\Driver\Controller\Adminhtml\Items
{

    public function execute()
    {
        $this->_forward('edit');
    }
}