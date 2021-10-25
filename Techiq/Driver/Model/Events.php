<?php


namespace Techiq\Driver\Model;

use Magento\Framework\Model\AbstractModel;

class Events extends AbstractModel
{
    /**
     * Define resource model
     */
    protected function _construct()
    {
        $this->_init('Techiq\Driver\Model\ResourceModel\Events');
    }
}