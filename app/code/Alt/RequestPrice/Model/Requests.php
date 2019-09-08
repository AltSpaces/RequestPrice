<?php

class Alt_RequestPrice_Model_Requests extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('requestprice/requests');
    }
}