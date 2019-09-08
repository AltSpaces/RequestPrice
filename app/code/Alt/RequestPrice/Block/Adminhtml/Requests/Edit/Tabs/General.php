<?php

class Alt_RequestPrice_Block_Adminhtml_Requests_Edit_Tabs_General extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _prepareForm()
    {
        $model = Mage::registry('current_request');
        $form = new Varien_Data_Form();
        $fieldset = $form->addFieldset('general_form', array(
            'legend' => $this->__('General Information')
        ));

        $fieldset->addField('customer_name', 'text', array(
            'label' => $this->__('Name'),
            'required' => true,
            'name' => 'customer_name',
        ));

        $fieldset->addField('customer_email', 'text', array(
            'label' => $this->__('Email'),
            'required' => true,
            'name' => 'customer_email',
        ));

        $fieldset->addField('product_sku', 'text', array(
            'label' => $this->__('Product SKU'),
            'required' => true,
            'name' => 'product_sku',
        ));

        $fieldset->addField('customer_comment', 'text', array(
            'label' => $this->__('Comment'),
            'required' => false,
            'name' => 'customer_comment',
        ));

        $fieldset->addField('status', 'select', array(
            'label'     => $this->__('Status'),
            'required'  => true,
            'values' => array(
                'new' => $this->__('New'),
                'in_progress' => $this->__('In progress'),
                'closed' => $this->__('Closed'),
            ),
            'name' => 'status'
        ));

        $fieldset->addField('created_at', 'hidden', array(
            'required' => false,
            'name' => 'created_at',
        ));

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }

}