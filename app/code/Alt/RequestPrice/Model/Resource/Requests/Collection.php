<?php

class Alt_RequestPrice_Model_Resource_Requests_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract {

    /**
     * Resource collection initialization
     *
     */
    protected function _construct()
    {
        $this->_init('requestprice/requests');
    }
}