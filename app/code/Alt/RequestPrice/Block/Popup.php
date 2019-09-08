<?php

class Alt_RequestPrice_Block_Popup extends Mage_Core_Block_Template
{
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('requestprice/popup.phtml');
    }
}

