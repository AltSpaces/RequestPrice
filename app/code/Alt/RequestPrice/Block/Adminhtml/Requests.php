<?php
class Alt_RequestPrice_Block_Adminhtml_Requests extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_requests';
        $this->_blockGroup = 'requestprice';
        parent::__construct();
        $this->_headerText = $this->__('Price Requests');
    }
}
