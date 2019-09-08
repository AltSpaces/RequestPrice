<?php

class Alt_RequestPrice_Adminhtml_RequestsController extends Mage_Adminhtml_Controller_Action
{
    /**
     * Action for loading grid
     */
    public function indexAction ()
    {
        $this->loadLayout();
        $contentBlock = $this->getLayout()->createBlock('requestprice/adminhtml_requests');
        $this->_addContent($contentBlock);
        $this->renderLayout();
    }

    /**
     * Action for editing request (loads and sets data to form)
     * @throws Mage_Core_Exception
     */
    public function editAction()
    {
        $id = (int) $this->getRequest()->getParam('id');
        $model = Mage::getModel('requestprice/requests');

        if($data = Mage::getSingleton('adminhtml/session')->getFormData()){
            $model->setData($data)->setId($id);
        } else {
            $model->load($id);
        }
        Mage::register('current_request', $model);

        $this->loadLayout()->_setActiveMenu('general');
        $this->_addLeft($this->getLayout()->createBlock('requestprice/adminhtml_requests_edit_tabs'));
        $this->_addContent($this->getLayout()->createBlock('requestprice/adminhtml_requests_edit'));
        $this->renderLayout();
    }

    /**
     * Save updated request
     */
    public function saveAction()
    {
        $id = $this->getRequest()->getParam('id');
        if ($data = $this->getRequest()->getPost()) {
            try {
                $model = Mage::getModel('requestprice/requests');

                $model->setData($data)->setId($id);
                if (!$model->getCreatedAt()) {
                    $model->setCreatedAt(now());
                }
                $model->save();
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('Could save request'));
                $this->_redirect('*/*/');
                return;
            }
            Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Request was saved successfully'));
            $this->_redirect('*/*/');
        }
    }

    /**
     * Action for updating grid
     */
    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('requestprice/adminhtml_requests_grid')->toHtml()
        );
    }

    /**
     * Action for mass deleting requests
     */
    public function massDeleteAction()
    {
        $idsArray = $this->getRequest()->getParam('id');
        $collection = Mage::getResourceModel('requestprice/requests_collection')
            ->addFieldToFilter('entity_id',
                ['in' => $idsArray]
            );
        foreach ($collection as $article) {
            $article->delete()->save();
        }
        $this->_redirectReferer();
    }

}
