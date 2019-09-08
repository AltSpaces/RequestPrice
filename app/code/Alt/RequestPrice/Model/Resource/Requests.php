<?php

class Alt_RequestPrice_Model_Resource_Requests extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * initialize resource model
     *
     * @access protected
     * @return void
     * @see Mage_Core_Model_Resource_Abstract::_construct()
     */
    protected function _construct()
    {
        $this->_init('requestprice/requests', 'entity_id');
    }
}