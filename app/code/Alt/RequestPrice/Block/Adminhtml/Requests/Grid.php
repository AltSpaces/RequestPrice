<?php

class Alt_RequestPrice_Block_Adminhtml_Requests_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('requests_list');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('desc');
        $this->setUseAjax(true);
        $this->setAfter('tags');

        $this->setEmptyText($this->__('No Results Found'));
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel('requestprice/requests_collection');
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('entity_id', array(
            'header'     => $this->__('Id'),
            'align'      => 'left',
            'width'      => '50px',
            'index'      => 'entity_id',
        ));

        $this->addColumn('customer_name', array(
            'header'     => $this->__('Name'),
            'width'      => '140px',
            'type'       => 'text',
            'index'      => 'customer_name',
        ));

        $this->addColumn('customer_email', array(
            'header'     => $this->__('Email'),
            'align'      => 'left',
            'index'      => 'customer_email',
        ));

        $this->addColumn('status', array(
            'header'     => $this->__('Status'),
            'index'      => 'status',
            'type'       => 'options',
            'options'    => array(
                'new' => Mage::helper('eav')->__('New'),
                'in_progress' => Mage::helper('eav')->__('In progress'),
                'closed' => Mage::helper('eav')->__('Closed'),
            )
        ));


        $this->addColumn('created_at', array(
            'header'     => $this->__('Created At'),
            'index'      => 'created_at',
            'width'      => '140px',
            'type'       => 'text',
        ));

        return parent::_prepareColumns();
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('id');
        $this->getMassactionBlock()->setFormFieldName('id');

        $this->getMassactionBlock()->addItem('delete', array(
            'label' => $this->__('Delete'),
            'url' => Mage::helper('adminhtml')->getUrl('requestprice_admin/adminhtml_requests/massDelete'),
            'confirm' => $this->__('Are you sure to delete selected requests?'),
        ));

        return $this;
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }
}