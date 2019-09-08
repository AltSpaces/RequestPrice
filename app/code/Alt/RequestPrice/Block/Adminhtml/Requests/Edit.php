<?php


class Alt_RequestPrice_Block_Adminhtml_Requests_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'requestprice';
        $this->_controller = 'adminhtml_requests';
    }

    public function getHeaderText()
    {
        $model = Mage::registry('current_request');

        if ($model->getId()) {
            return $this->__("Edit Request '%s'", $this->escapeHtml($model->getId()));
        }
    }

}