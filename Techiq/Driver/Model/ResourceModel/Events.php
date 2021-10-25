<?php

namespace Techiq\Driver\Model\ResourceModel;

class Events extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Define main table
     */
    protected function _construct()
    {
        $this->_init('techiq_driver_table', 'entity_id');   //here "chirag_events_table" is table name and "entity_id" is the primary key of custom table
    }
}
