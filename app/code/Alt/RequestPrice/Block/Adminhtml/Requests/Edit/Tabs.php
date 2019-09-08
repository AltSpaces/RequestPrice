<?php

class Alt_RequestPrice_Block_Adminhtml_Requests_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('requests_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle($this->__('Request Information'));
    }

    protected function _prepareLayout()
    {
        $this->addTab('general_section', array(
            'label' => $this->__('General Information'),
            'title' => $this->__('General Information'),
            'content' => $this->getLayout()
                ->createBlock('requestprice/adminhtml_requests_edit_tabs_general')
                ->toHtml(),
        ));
        return parent::_prepareLayout();
    }
}